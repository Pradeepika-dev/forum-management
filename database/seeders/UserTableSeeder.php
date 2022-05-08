<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'role_id' => 2,
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => Carbon::now()
            ]
        ];
        DB::table('users')->insert($users);
    }
}
