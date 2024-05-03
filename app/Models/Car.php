<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'car';
    protected $primaryKey = 'idCar';

    protected $fillable = [
        'idCar',
        'name',
        'chassis',
        'powerUnit',
        'maxSpeed',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'Team_idTeam');
    }
}
