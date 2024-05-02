<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandPrix extends Model
{
    use HasFactory;

    protected $table= "grandprix";
    protected $primaryKey = 'idGrandPrix';

    protected $fillable = [
        'year'
    ];

    public function prix()
    {
        return $this->hasMany(Prix::class, 'GrandPrix_idGrandPrix');
    }
}
