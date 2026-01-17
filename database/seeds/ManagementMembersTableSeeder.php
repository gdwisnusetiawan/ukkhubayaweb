<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managementMembers = [
            // President
            [
                'management_id' => 1,
                'member_id' => 's160419001', // Student 1
                'role' => 'head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Vice President
            [
                'management_id' => 2,
                'member_id' => 's160419002', // Student 2
                'role' => 'head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Secretary
            [
                'management_id' => 3,
                'member_id' => 's160419003', // Student 3
                'role' => 'head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Treasurer
            [
                'management_id' => 4,
                'member_id' => 's160419004', // Student 4
                'role' => 'head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('management_member')->insert($managementMembers);
    }
}
