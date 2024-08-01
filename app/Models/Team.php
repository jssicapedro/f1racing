<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    protected $primaryKey = 'idTeam';

    protected $fillable = [
        'name',
        'fullName',
        'base',
        'country',
        'teamChief',
        'technicalChief',
        'firstTeamEntry',
        'polePosition',
        'worldChampionShips',
        'color',
        'imgFullName',
        'imgLogo',
        'imgTeam'
    ];

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'Team_idTeam', 'idTeam');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'Car_idCar', 'idCar');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country', 'name');
    }
}
