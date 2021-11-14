<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'name' => 'Laravel',
            'description' => 'Un petit cours sur laravel - Framework PHP',
            'picture' => 'Laravel.png',
            'price' =>'20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('formations')->insert([
            'name' => 'Algo',
            'description' => 'Un petit cours sur l\'Algorithmie - Maths / Programmation',
            'picture' => 'algo.jpg',
            'price' =>'10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('formations')->insert([
            'name' => 'PHP',
            'description' => 'Ce cours contient toutes les bases du langage PHP - prérequis pour les "Framework PHP"',
            'picture' => 'php_logo.png',
            'price' =>'30',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
