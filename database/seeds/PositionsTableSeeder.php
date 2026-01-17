<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => 'President',
                'icon' => 'fa fa-user-tie',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vice President',
                'icon' => 'fa fa-user-secret',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Secretary',
                'icon' => 'fa fa-file-alt',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treasurer',
                'icon' => 'fa fa-money-bill-wave',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Division Head',
                'icon' => 'fa fa-users',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member',
                'icon' => 'fa fa-user',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('positions')->insert($positions);
    }
}
