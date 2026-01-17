<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommitteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For Event 1
        $committees = [
            [
                'event_id' => 1,
                'position_id' => 1, // President (of the committee/KP)
                'job' => 'Project Manager',
                'information' => 'Responsible for the entire event.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 1,
                'position_id' => 3, // Secretary
                'job' => 'Secretary',
                'information' => 'Event administration.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 1,
                'position_id' => 5, // Division Head
                'job' => 'Event Division',
                'information' => 'Coordinating event flow.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('committees')->insert($committees);
    }
}
