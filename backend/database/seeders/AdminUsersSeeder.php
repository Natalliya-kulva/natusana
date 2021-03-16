<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userModel = config('admin.database.users_model');

        $userModel::truncate();
        $userModel::insert(
            [
                [
                    "username" => "administrator",
                    "password" => bcrypt("ym2lPm"),
                    "name" => "Administrator"
                ],
                [
                    "username" => "moderator",
                    "password" => bcrypt("KxsCfF"),
                    "name" => "Moderator"
                ]
            ]
        );


        DB::table('admin_role_users')->truncate();
        DB::table('admin_role_users')->insert(
            [
                [
                    "role_id" => 1,
                    "user_id" => 1,
                ],
                [
                    "role_id" => 2,
                    "user_id" => 2,
                ]
            ]
        );
    }
}
