<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $this->call([
            ConfigSeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CountySeeder::class,
            CitySeeder::class,
            CategorySeeder::class,
            CriminalCaseSeeder::class,
            CriminalSeeder::class,
            JudgeSeeder::class,
            ArticleSeeder::class,
            ImageSeeder::class,
            ContactSeeder::class
        ]);
        
    }

}