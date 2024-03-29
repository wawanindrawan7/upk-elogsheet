<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGALogsheet extends Model
{
    use HasFactory;
    protected $table = 'plts_gili_air_logsheet';
    public $timestamps = false;

    public function pltsGiliAirInverter(){
        return $this->belongsTo('App\Models\PLTSGAInverter');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
