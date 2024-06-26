<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';
    protected $primaryKey = 'idCalendar';

    protected $fillable = [
        'Prix_idPrix',
        'GrandPrix_idGrandPrix',
        'T1',
        'T2',
        'T3',
        'sprintQualify',
        'sprint',
        'qualify',
        'race'
    ];

    public function prix()
    {
        return $this->belongsTo(Prix::class, 'Prix_idPrix');
    }

    public function grandprix()
    {
        return $this->belongsTo(GrandPrix::class, 'GrandPrix_idGrandPrix');
    }
}
