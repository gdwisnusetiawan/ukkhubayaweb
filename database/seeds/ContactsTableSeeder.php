<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'name' => 'Email',
                'icon' => 'fa fa-envelope',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Line',
                'icon' => 'fab fa-line',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'WhatsApp',
                'icon' => 'fab fa-whatsapp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Website',
                'icon' => 'fa fa-globe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contacts')->insert($contacts);
    }
}
