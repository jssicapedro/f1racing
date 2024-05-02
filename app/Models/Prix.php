<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prix extends Model
{
    protected $table = 'prix';
    use HasFactory;

    public function results()
    {
        return $this->belongsTo(Results::class, 'GrandPrix_idGrandPrix');
    }
}
