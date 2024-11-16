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
            'email' => 'test@example.com',
            'username' => 'testing1',
            'password' => bcrypt('password'),
            'role' => 'pemohon',
        ]);
    }
}
