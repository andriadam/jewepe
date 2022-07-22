<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'npm' => '10118792',
            'password' => '10118792',
            'nama' => '',
            'kelas' => '4KA32',
        ]);
        User::create([
            'npm' => '10118793',
            'password' => '10118793',
            'nama' => 'User 2',
            'kelas' => '4KA32',
        ]);
        User::create([
            'npm' => '10118794',
            'password' => '10118794',
            'nama' => 'User 3',
            'kelas' => '4KA33',
        ]);
        User::create([
            'npm' => '10118795',
            'password' => '10118795',
            'nama' => 'User 4',
            'kelas' => '4KA34',
        ]);
    }
}
