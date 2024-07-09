<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prix extends Model
{
    use HasFactory;

    protected $table= "prix";
    protected $primaryKey = 'idPrix';

    protected $fillable = [
        'name',
        'grandPrixName',
        'country',
        'firstGrandPrix',
        'distance',
        'length',
        'info',
        'comunName'
    ];

    public function results()
    {
        return $this->hasMany(Results::class, 'Prix_idPrix');
    }
}
