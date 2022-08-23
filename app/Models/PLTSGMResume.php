<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGMResume extends Model
{
    use HasFactory;

    protected $table = 'plts_gm_resume';
    public $timestamps = false;

    public function pltsGmInverter(){
        return $this->belongsTo('App\Models\PLTSGMInverter');
    }

    public function pltsGmLogsheet(){
        return $this->belongsTo('App\Models\PLTSGMLogsheet');
    }
}
