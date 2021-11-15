<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            FormationSeeder::class,
            CategoriesSeeder::class,
            TypesSeeder::class,
            FormationByCategoriesSeeder::class,
            FormationByTypesSeeder::class,
            ChapterSeeder::class
        ]);
    }
}
