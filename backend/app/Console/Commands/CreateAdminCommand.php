<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\InputOption;
use App\Role;
use App\User;

class CreateAdminCommand extends Command
{
    protected $name = 'admin:user';

    protected $description = 'Create administrator user';

    public function fire()
    {
        return $this->handle();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        if ( ! $name ) $name = $this->ask('Enter the admin name');
        if ( ! $password ) $password = $this->secret('Enter admin password');
        if ( ! $email ) $email = $this->ask('Enter the admin email');

        $user = User::where('email', $email)->first();

        if ( $user ) {
            $this->info('Editing admin account');

            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
        } else {
            $this->info('Creating admin account');

            $user = User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
            ]);
        }

        $user->save();

        $user->assignRole('admin');

        $this->info('The user now has administrator access to your site.');
    }

    protected function getArguments()
    {
        return [
            ['name', InputOption::VALUE_REQUIRED, 'The name of the user.', null],
            ['email', InputOption::VALUE_REQUIRED, 'The email of the user.', null],
            ['password', InputOption::VALUE_REQUIRED, 'The password of the user.', null],
        ];
    }
}