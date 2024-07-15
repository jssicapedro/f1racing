<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Prix;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';
    protected $primaryKey = 'idResults';

    protected $fillable = [
        'position', 
        'points', 
        'fastLapNumber', 
        'fastLapTime', 
        'Driver_idDriver', 
        'Prix_idPrix', 
        'GrandPrix_idGrandPrix',
    ];


    public function driver()
    {
        return $this->belongsTo(Driver::class, 'Driver_idDriver');
    }
    
    public function prix()
    {
        return $this->belongsTo(Prix::class, 'Prix_idPrix', 'idPrix');
    }

    public function grandprix()
    {
        return $this->belongsTo(GrandPrix::class, 'GrandPrix_idGrandPrix');
    }

}
