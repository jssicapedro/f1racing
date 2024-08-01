<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('team')->insert([
            [
                'idTeam' => 1,
                'name' => 'Red Bull',
                'fullName' => 'Oracle Red Bull Racing',
                'base' => 'Milton Keynes, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'Christian Horner',
                'technicalChief' => 'Pierre Waché',
                'firstTeamEntry' => 1997,
                'polePositions' => 97,
                'worldChampionShips' => 6,
                'color' => '#122C5A',
                'imgLogo' => 'RedBull.png',
                'imgTeam' => '',
                'imgFullName' => 'RedBull_full.png',
                'Car_idCar' => 1
            ],
        [
                'idTeam' => 2,
                'name' => 'Ferrari',
                'fullName' => 'Scuderia Ferrari',
                'base' => 'Maranello, Italy',
                'country' => 'Italy',
                'teamChief' => 'Frédéric Vasseur',
                'technicalChief' => 'Enrico Cardile / Enrico Gualtieri',
                'firstTeamEntry' => 1950,
                'polePositions' => 249,
                'worldChampionShips' => 16,
                'color' => '#E10515',
                'imgLogo' => 'Ferrari.png',
                'imgTeam' => '',
                'imgFullName' => 'Ferrari_full.png',
                'Car_idCar' => 2
            ],
        [
                'idTeam' => 3,
                'name' => 'McLaren',
                'fullName' => 'McLaren Formula 1 Team',
                'base' => 'Woking, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'Andrea Stella',
                'technicalChief' => 'Peter Prodromou / David Sanchez / Rob Marshall',
                'firstTeamEntry' => 1966,
                'polePositions' => 156,
                'worldChampionShips' => 8,
                'color' => '#FFFFFF',
                'imgLogo' => 'McLaren.png',
                'imgTeam' => '',
                'imgFullName' => 'McLaren_full.png',
                'Car_idCar' => 3
            ],
        [
                'idTeam' => 4,
                'name' => 'Mercedes',
                'fullName' => 'Mercedes-AMG PETRONAS F1 Team',
                'base' => 'Brackley, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'Toto Wolff',
                'technicalChief' => 'James Allison',
                'firstTeamEntry' => 1970,
                'polePositions' => 129,
                'worldChampionShips' => 8,
                'color' => '#23E7C6',
                'imgLogo' => 'Mercedes.png',
                'imgTeam' => '',
                'imgFullName' => 'Mercedes_full.png',
                'Car_idCar' => 4
            ],
        [
                'idTeam' => 5,
                'name' => 'Aston Martin',
                'fullName' => 'Aston Martin Aramco F1 Team',
                'base' => 'Silverstone, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'Mike Krack',
                'technicalChief' => 'Dan Fallows',
                'firstTeamEntry' => 2018,
                'polePositions' => 1,
                'worldChampionShips' => NULL,
                'color' => '#00665F',
                'imgLogo' => 'AstonMartin.png',
                'imgTeam' => '',
                'imgFullName' => 'AstonMartin_full.png',
                'Car_idCar' => 5
            ],
        [
                'idTeam' => 6,
                'name' => 'Haas',
                'fullName' => 'MoneyGram Haas F1 Team',
                'base' => 'Kannapolis, United States',
                'country' => 'United States',
                'teamChief' => 'Ayao Komatsu',
                'technicalChief' => 'Andrea De Zordo',
                'firstTeamEntry' => 2016,
                'polePositions' => 1,
                'worldChampionShips' => NULL,
                'color' => '#B6BABD',
                'imgLogo' => 'Haas.png',
                'imgTeam' => '',
                'imgFullName' => 'Haas_full.png',
                'Car_idCar' => 6
            ],
        [
                'idTeam' => 7,
                'name' => 'Williams',
                'fullName' => 'Williams Racing',
                'base' => 'Grove, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'James Vowles',
                'technicalChief' => 'Pat Fry',
                'firstTeamEntry' => 1978,
                'polePositions' => 128,
                'worldChampionShips' => 9,
                'color' => '#64C4FF',
                'imgLogo' => 'Williams.png',
                'imgTeam' => '',
                'imgFullName' => 'Williams_full.png',
                'Car_idCar' => 7
            ],
        [
                'idTeam' => 8,
                'name' => 'Kick Sauber',
                'fullName' => 'Stake F1 Team Kick Sauber',
                'base' => 'Hinwil, Switzerland',
                'country' => 'Switzerland',
                'teamChief' => 'Alessandro Alunni Bravi',
                'technicalChief' => 'James Key',
                'firstTeamEntry' => 1993,
                'polePositions' => 1,
                'worldChampionShips' => NULL,
                'color' => '#00E700',
                'imgLogo' => 'KickSauber.png',
                'imgTeam' => '',
                'imgFullName' => 'KickSauber_full.png',
                'Car_idCar' => 8
            ],
        [
                'idTeam' => 9,
                'name' => 'RB',
                'fullName' => 'Visa Cash App RB Formula One Team',
                'base' => 'Faenza, Italy',
                'country' => 'Italy',
                'teamChief' => 'Laurent Mekies',
                'technicalChief' => 'Jody Egginton',
                'firstTeamEntry' => 1985,
                'polePositions' => 1,
                'worldChampionShips' => NULL,
                'color' => '#1434CB',
                'imgLogo' => 'RB.png',
                'imgTeam' => '',
                'imgFullName' => 'RB_full.png',
                'Car_idCar' => 9
            ],
        [
                'idTeam' => 10,
                'name' => 'Alpine',
                'fullName' => 'BWT Alpine F1 Team',
                'base' => 'Enstone, United Kingdom',
                'country' => 'United Kingdom',
                'teamChief' => 'Bruno Famin',
                'technicalChief' => 'Joe Burnell / David Wheater / Ciaron Pilbeam',
                'firstTeamEntry' => 1986,
                'polePositions' => 20,
                'worldChampionShips' => 2,
                'color' => '#FF87BC',
                'imgLogo' => 'Alpine.png',
                'imgTeam' => '',
                'imgFullName' => 'Alpine_full.png',
                'Car_idCar' => 10
            ],
        ]);
    }
}