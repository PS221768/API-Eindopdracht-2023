<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SicknessAbsencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all students
        $students = DB::table('students')->get();
        
        // get all reasons
        $reasons = DB::table('reasons')->get();

        // create 25 new sickness_absences, idk why 25, I just wanted to try a diffrent number for relation databases
        for ($i = 1; $i <= 25; $i++) {
            DB::table('sickness_absences')->insert([
                'description' => 'Sickness absence '.$i,
                'reason_id' => $reasons->random()->id,
                'student_id' => $students->random()->id,
                'Duration' => rand(3600, 86400), // random duration between 1 and 24 hours
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
