<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrandPrixTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grandprix')->insert([
            [
               'idGrandPrix' => 1,
                'name' => 'F1 Schedule 2024',
                'year' => 2024
            ],
            [
                'idGrandPrix' => 2,
                 'name' => 'F1 Schedule 2023',
                 'year' => 2023
             ],
        ]);
    }
}
