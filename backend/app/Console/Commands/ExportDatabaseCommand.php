<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\InputOption;

class ExportDatabaseCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:export';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export database to backup.sql';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $connection = env('DB_CONNECTION', false);
        $database = env('DB_DATABASE', false);
        $username = env('DB_USERNAME', false);
        $password = env('DB_PASSWORD', false);

        if ( $connection == 'mysql' && $database ) {
            exec('mysqldump -u ' . $username . ' -p' . $password . ' ' . $database . ' > ' . base_path('backup.sql'));
        } else {
            $this->info('DB_CONNECTION or DB_DATABASE is not set in .env');
        }
    }
}