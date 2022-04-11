<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $user;

    public function run()
    {
        $this->user = [
            [
                'firstName' => 'Administrator',
                'lastName' => 'Administrator',
                'middleName' => 'Administrator',
                'login' => 'admin',
                'role' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin_pass'),
            ]
        ];

        DB::table('users')->insert($this->user);
    }
}
