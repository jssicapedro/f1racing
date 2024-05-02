<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table= "driver";
    protected $primaryKey = 'idDriver';

    protected $fillable = [
        'firtName',
        'lastName',
        'number',
        'birth',
        'country',
        'podiums',
        'grandPrix',
        'bibliography',
        'imgDriver',
        'imgDriverProfile',
        'imgNumber',
        'imgCountry',
        'Team_idTeam',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'Team_idTeam', 'idTeam');
    }

    public function results()
    {
        return $this->hasMany(Results::class, 'Driver_idDriver');
    }
}
