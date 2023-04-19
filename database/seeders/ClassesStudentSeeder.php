<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesStudentSeeder extends Seeder
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
            DB::table('classes_student')->insert([
                'classes_id' => $classes->random()->id,
                'student_id' => $students->random()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
