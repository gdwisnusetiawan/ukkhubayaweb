<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            [
                'year_begin' => 2021,
                'year_end' => 2022,
                'active' => 'no',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year_begin' => 2022,
                'year_end' => 2023,
                'active' => 'no',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year_begin' => 2023,
                'year_end' => 2024,
                'active' => 'yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year_begin' => 2024,
                'year_end' => 2025,
                'active' => 'no',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('periods')->insert($periods);
    }
}
