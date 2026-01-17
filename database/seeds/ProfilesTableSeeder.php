<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Unit Kegiatan Kerohanian Hindu (UKKH) Universitas Surabaya',
            'logo' => 'default_ukm_logo.png',
            'vision' => 'Menjadi wadah bagi mahasiswa Hindu Universitas Surabaya untuk mengembangkan spiritualitas dan solidaritas.',
            'mission' => '<ul><li>Meningkatkan sradha dan bhakti mahasiswa Hindu Ubaya.</li><li>Mempererat tali persaudaraan antar anggota.</li><li>Melaksanakan kegiatan Tri Hita Karana.</li></ul>',
            'established' => '1990-09-01',
            'address' => 'Student Center, Ubaya Tenggilis Campus',
            'description' => 'Unit Kegiatan Kerohanian Hindu (UKKH) Ubaya adalah organisasi kemahasiswaan yang mewadahi mahasiswa beragama Hindu di lingkungan Universitas Surabaya untuk beraktivitas, berkarya, dan menjalin persaudaraan berlandaskan ajaran agama Hindu.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
