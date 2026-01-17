<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [];
        for ($i = 1; $i <= 10; $i++) {
            $nrp = 's1604190' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $members[] = [
                'id' => $nrp,
                'name' => 'Student ' . $i,
                'year' => 2019,
                'type' => 'student',
                'faculty_id' => 1, // Faculty of Engineering
                'user_id' => $nrp,
                'place_of_birth' => 'Surabaya',
                'date_of_birth' => '2000-01-01',
                'original_address' => 'Jl. Raya Kalirungkut',
                'residence_address' => 'Jl. Tenggilis Mejoyo',
                'hobby' => 'Coding',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('members')->insert($members);
    }
}
