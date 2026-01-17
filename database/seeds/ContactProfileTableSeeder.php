<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactProfiles = [
            [
                'contact_id' => 1, // Email
                'profile_id' => 1,
                'link' => 'mailto:admin@ukm.ubaya.ac.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 2, // Instagram
                'profile_id' => 1,
                'link' => 'https://instagram.com/ukmkomputer_ubaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'contact_id' => 4, // WhatsApp
                'profile_id' => 1,
                'link' => 'https://wa.me/628123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contact_profile')->insert($contactProfiles);
    }
}
