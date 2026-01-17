<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@ukm.ubaya.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'viewer',
                'name' => 'Viewer',
                'email' => 'viewer@ukm.ubaya.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 'viewer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Add some dummy student users
        $users = [];
        for ($i = 1; $i <= 10; $i++) {
            $users[] = [
                'id' => 's1604190' . str_pad($i, 2, '0', STR_PAD_LEFT), // Dummy NRP
                'name' => 'Student ' . $i,
                'email' => 's1604190' . str_pad($i, 2, '0', STR_PAD_LEFT) . '@student.ubaya.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'role' => 'viewer',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('users')->insert($users);
    }
}
