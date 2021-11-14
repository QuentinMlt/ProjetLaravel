<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Débutant',
        ]);
        
        DB::table('types')->insert([
            'name' => 'Intermédiaire',
        ]);

        DB::table('types')->insert([
            'name' => 'Expert',
        ]);
    }
}
