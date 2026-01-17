<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommitteeMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $committeeMembers = [
            [
                'committee_id' => 1, // Project Manager
                'member_id' => 's160419005', // Student 5
                'role' => 'head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'committee_id' => 2, // Secretary
                'member_id' => 's160419006', // Student 6
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'committee_id' => 3, // Event Division
                'member_id' => 's160419007', // Student 7
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('committee_member')->insert($committeeMembers);
    }
}
