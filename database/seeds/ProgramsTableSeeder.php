<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'name' => 'Dharma Yowana',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'U-Champ',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tirta Yatra',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bazaar',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bali Festival',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suksesi',
                'logo' => 'default_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
