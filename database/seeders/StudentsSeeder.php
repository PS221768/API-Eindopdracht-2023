<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // create 10 new students
        for ($i = 1; $i <= 10; $i++) {
            DB::table('students')->insert([
                'name' => 'Student '.$i,
                'adress' => 'Address '.$i,
                'email' => 'student'.$i.'@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
