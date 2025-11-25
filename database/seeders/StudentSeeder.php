<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nim' => '1204230085',
            'name' => 'Ridho Dummy',
            'password' => Hash::make('password123'),
        ]);

        Student::create([
            'nim' => '1204230056',
            'name' => 'Adela Dummy',
            'password' => Hash::make('rahasia123'),
        ]);
    }
}
