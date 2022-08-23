<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGiliAirResume extends Model
{
    use HasFactory;
    protected $table = 'plts_gili_air_resume';
    public $timestamps = false;

    public function pltsGiliAirInverter(){
        return $this->belongsTo('App\Models\PLTSGiliAirInverter');
    }

    public function pltsGiliAirLogsheet(){
        return $this->belongsTo('App\Models\PLTSGiliAirLogsheet');
    }
}
