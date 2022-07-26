<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGAInverter extends Model
{
    use HasFactory;
    protected $table = 'plts_gili_air_inverter';
    public $timestamps = false;

    public function pltsGaLogsheet(){
        return $this->hasMany('App\Models\PLTSGALogsheet');
    }
}
