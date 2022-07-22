<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'nama' => 'Junior Web Programmer',
            'keterangan' => 'Bikin web',
            'lama_kursus' => '2',
        ]);
        Course::create([
            'nama' => 'Programmer',
            'keterangan' => 'Bikin aplikasi',
            'lama_kursus' => '2',
        ]);
        Course::create([
            'nama' => 'Pemrograman Berioentasi Objek',
            'keterangan' => 'Bikin app pbo',
            'lama_kursus' => '2',
        ]);
        Course::create([
            'nama' => 'Design Grafis',
            'keterangan' => 'Bikin banner',
            'lama_kursus' => '2',
        ]);
        Course::create([
            'nama' => 'Teknisi Utama Jaringan Komputer',
            'keterangan' => 'Bikin jaringan',
            'lama_kursus' => '2',
        ]);
    }
}
