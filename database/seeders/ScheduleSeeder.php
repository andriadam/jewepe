<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'nama_kursus' => 'Junior Web Programmer',
            'waktu_kursus' => '2022-07-20 09:00',
        ]);
        Schedule::create([
            'nama_kursus' => 'Junior Web Programmer',
            'waktu_kursus' => '2022-08-20 09:00',
        ]);
        Schedule::create([
            'nama_kursus' => 'Programmer',
            'waktu_kursus' => '2022-07-21 09:00',
        ]);
        Schedule::create([
            'nama_kursus' => 'Pemrograman Berioentasi Objek',
            'waktu_kursus' => '2022-07-22 09:00',
        ]);
        Schedule::create([
            'nama_kursus' => 'Design Grafis',
            'waktu_kursus' => '2022-07-23 09:00',
        ]);
        Schedule::create([
            'nama_kursus' => 'Teknisi Utama Jaringan Komputer',
            'waktu_kursus' => '2022-07-24 09:00',
        ]);
    }
}
