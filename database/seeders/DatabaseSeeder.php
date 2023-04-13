<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Order a-z
            classesSeeder::class,
            reasonsSeeder::class,
            StudentsSeeder::class,

            // relation depended tables will come last
            ClassStudentsSeeder::class,
            SicknessAbsencesSeeder::class
        ]);
    }
}
