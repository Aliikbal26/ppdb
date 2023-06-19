<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'aliikbaljamphers26@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'photo' => 'Aliikbal.jpg'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'level' => 'user',
            'photo' => 'Aliikbal.jpg'
        ]);
        User::create([
            'name' => 'operator',
            'email' => 'oprator@gmail.com',
            'password' => Hash::make('oprator'),
            'level' => 'oprator',
            'photo' => 'Aliikbal.jpg'
        ]);
        Student::create([
            'nama' => 'Ali Ikbal',
            'nim' => '41200001',
            'gender' => 'Laki-Laki',
            'email' => 'user@gmail.com',
            'no_pendaftaran' => Student::generateNoPendaftaran(),
            'jurusan' => 'Teknik Informatika',
            'foto' => 'Aliikbal.jpg',
            'status' => 'pending'
        ]);
    }
}
