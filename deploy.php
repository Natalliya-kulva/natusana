<?php
namespace Deployer;

require 'recipe/laravel.php';
require './vendor/deployer/recipes/recipe/npm.php';
require './vendor/deployer/recipes/recipe/slack.php';

set('application', 'laravel-nuxt-skeleton');
set('repository', 'git@github.com:stansmet/laravel-nuxt-skeleton.git');
set('slack_webhook', 'https://hooks.slack.com/services/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');

set('keep_releases', 2);
set('git_tty', true);
add('shared_files', []);
add('shared_dirs', ['public/uploads']);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
inventory('hosts.yml');

// Tasks
task('install:copy_env', function () {
    run('cd {{release_path}} && cp .env.example .env');
});

task('install:set_chmod', function () {
    run('cd {{release_path}} && chmod 777 storage/logs bootstrap/cache storage storage/framework/sessions');
    run('cd {{deploy_path}} && chmod 777 shared/public/uploads');
});

task('install:generate_tokens', function () {
    run('cd {{release_path}} && php artisan key:generate');
    run('cd {{release_path}} && php artisan jwt:secret');
});

task('deploy:reboot_php', function () {
    run('sudo /usr/sbin/service php7.2-fpm restart');
});

task('deploy:app', function () {
    run('cd {{release_path}} && npm run app:build');
});

task('deploy:admin', function () {
    run('cd {{release_path}} && npm run admin:build');
});

task('deploy:export_db', function () {
    if (has('previous_release')) {
        run('cd {{previous_release}} && php artisan db:export');
    }
});

task('install', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'install:copy_env',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'install:generate_tokens',
    'install:set_chmod',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success',
    'deploy:reboot_php'
]);

task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:export_db',
    'deploy:shared',

    'npm:install',
    'deploy:app',
    'deploy:admin',

    'deploy:writable',
    'deploy:vendors',
    'artisan:migrate',
    'artisan:db:seed',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success',
    'deploy:reboot_php'
]);

after('deploy:failed', 'deploy:unlock');
after('success', 'slack:notify:success');
after('deploy:failed', 'slack:notify:failure');
