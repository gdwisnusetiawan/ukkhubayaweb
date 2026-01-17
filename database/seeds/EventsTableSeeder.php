<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'period_id' => 3, // 2023-2024
                'program_id' => 1, // Dharma Yowana
                'year' => 2023,
                'date_begin' => '2023-09-15',
                'date_end' => '2023-09-16',
                'time_begin' => '16:00:00',
                'time_end' => '10:00:00',
                'location' => 'Villa Trawas',
                'description' => 'Malam keakraban mahasiswa baru mahasiswa Hindu Ubaya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'period_id' => 3, // 2023-2024
                'program_id' => 2, // U-Champ
                'year' => 2023,
                'date_begin' => '2023-11-10',
                'date_end' => '2023-11-12',
                'time_begin' => '08:00:00',
                'time_end' => '16:00:00',
                'location' => 'Ubaya Sports Center',
                'description' => 'UKKH Championship: Turnamen olahraga (Badminton & Futsal) antar anggota UKKH.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'period_id' => 4, // 2024-2025
                'program_id' => 3, // Tirta Yatra
                'year' => 2024,
                'date_begin' => '2024-03-20',
                'date_end' => '2024-03-24',
                'time_begin' => '06:00:00',
                'time_end' => '20:00:00',
                'location' => 'Pura di Lombok',
                'description' => 'Perjalanan rohani (Tirta Yatra) mengunjungi pura-pura di Lombok.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'period_id' => 4, // 2024-2025
                'program_id' => 5, // Bali Festival
                'year' => 2024,
                'date_begin' => '2024-05-15',
                'date_end' => '2024-05-15',
                'time_begin' => '18:00:00',
                'time_end' => '22:00:00',
                'location' => 'Lapangan Perpustakaan Ubaya',
                'description' => 'Festival seni dan budaya Bali yang dipertunjukkan untuk seluruh civitas akademika Ubaya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('events')->insert($events);
    }
}
