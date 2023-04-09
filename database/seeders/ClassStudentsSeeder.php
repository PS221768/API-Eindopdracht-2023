<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all classes
        $classes = DB::table('classes')->get();
        
        // get all students
        $students = DB::table('students')->get();

        // create 25 new sickness_absences, idk why 25, I just wanted to try a diffrent number for relation databases
        for ($i = 1; $i <= 25; $i++) {
            DB::table('class_students')->insert([
                'class_id' => $classes->random()->id,
                'student_id' => $students->random()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
