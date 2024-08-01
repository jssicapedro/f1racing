<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'iso_3166_2',
        'iso_3166_3',
        'name',
        'official_name',
        'common_name',
        'flag'
    ];

    public function teams()
    {
        return $this->hasMany(Team::class, 'country', 'name');
    }
}
