<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGMInverter extends Model
{
    use HasFactory;
    protected $table = 'plts_gm_inverter';
    public $timestamps = false;

    public function pltsGmLogsheet(){
        return $this->hasMany('App\Models\PLTSGMLogsheet');
    }
}
