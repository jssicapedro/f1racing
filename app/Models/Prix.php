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
        'info'
    ];

    public function results()
    {
        return $this->belongsTo(Results::class, 'GrandPrix_idGrandPrix');
    }
}
