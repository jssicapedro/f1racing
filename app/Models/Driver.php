<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table= "driver";

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
    ];
}
