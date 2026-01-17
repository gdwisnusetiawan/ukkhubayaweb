<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For Period 2023-2024 (ID 3)
        $managements = [
            [
                'job' => 'President',
                'information' => 'Leading the organization.',
                'period_id' => 3,
                'position_id' => 1, // President
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job' => 'Vice President',
                'information' => 'Assisting the President.',
                'period_id' => 3,
                'position_id' => 2, // Vice President
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job' => 'Secretary',
                'information' => 'Managing administration.',
                'period_id' => 3,
                'position_id' => 3, // Secretary
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job' => 'Treasurer',
                'information' => 'Managing finances.',
                'period_id' => 3,
                'position_id' => 4, // Treasurer
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('managements')->insert($managements);
    }
}
