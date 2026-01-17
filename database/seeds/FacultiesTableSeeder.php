<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            [
                'name' => 'Faculty of Engineering',
                'color' => '#007bff',
                'icon' => 'fa fa-cogs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Business and Economics',
                'color' => '#28a745',
                'icon' => 'fa fa-briefcase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Law',
                'color' => '#dc3545',
                'icon' => 'fa fa-gavel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Psychology',
                'color' => '#ffc107',
                'icon' => 'fa fa-brain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Pharmacy',
                'color' => '#17a2b8',
                'icon' => 'fa fa-pills',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Biotechnology',
                'color' => '#6610f2',
                'icon' => 'fa fa-flask',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Faculty of Creative Industries',
                'color' => '#e83e8c',
                'icon' => 'fa fa-paint-brush',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('faculties')->insert($faculties);
    }
}
