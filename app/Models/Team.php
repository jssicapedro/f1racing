<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    protected $fillable = [
        'idTeam',
        'name',
        'fullName',
        'base',
        'teamChief',
        'technicalChief',
        'firstTeamEntry',
        'polePosition',
        'worldChampionShips',
    ];

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'Team_idTeam', 'idTeam');
    }


}
