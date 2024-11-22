<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Applicant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'test applincant 1',
            'email' => 'test1@example.com',
            'username' => 'testing1',
            'password' => bcrypt('password'),
            'role' => 'pemohon',
        ]);
        User::create([
            'nama' => 'test applincant 2',
            'email' => 'test2@example.com',
            'username' => 'testing2',
            'password' => bcrypt('password'),
            'role' => 'pemohon',
        ]);
    }
}
