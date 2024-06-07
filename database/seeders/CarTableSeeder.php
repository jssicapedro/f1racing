<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car')->insert([
            [
                'idCar' => 1,
                'name' => 'RB20',
                'chassis' => 'RB20',
                'powerUnit' => 'Honda RBPT',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 2,
                'name' => 'SF-24',
                'chassis' => 'SF-24',
                'powerUnit' => 'Ferrari',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 3,
                'name' => 'MCL38',
                'chassis' => 'MCL38',
                'powerUnit' => 'Mercedes',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 4,
                'name' => 'W15',
                'chassis' => 'W15',
                'powerUnit' => 'Mercedes',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 5,
                'name' => 'AMR24',
                'chassis' => 'AMR24',
                'powerUnit' => 'Mercedes',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 6,
                'name' => 'VF-24',
                'chassis' => 'VF-24',
                'powerUnit' => 'Ferrari',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 7,
                'name' => 'FW46',
                'chassis' => 'FW46',
                'powerUnit' => 'Mercedes',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 8,
                'name' => 'C44',
                'chassis' => 'C44',
                'powerUnit' => 'Ferrari',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 9,
                'name' => 'VCARB 01',
                'chassis' => 'VCARB 01',
                'powerUnit' => 'Honda RBPT',
                'maxSpeed' => NULL,
            ],
            [
                'idCar' => 10,
                'name' => 'A524',
                'chassis' => 'A524',
                'powerUnit' => 'Renault',
                'maxSpeed' => NULL,
            ],
        ]);
    }
}
