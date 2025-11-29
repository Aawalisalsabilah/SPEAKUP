<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'employee_code' => 'ADM001',
            'name' => 'Super Admin',
            'password' => Hash::make('123'),
        ]);

        Student::create([
            'nim' => '123456789',
            'name' => 'Ridho',
            'password' => Hash::make('123'),
        ]);
    }
}
