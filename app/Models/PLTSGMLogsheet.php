<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSGMLogsheet extends Model
{
    use HasFactory;
    protected $table = 'plts_gm_logsheet';
    public $timestamps = false;

    public function pltsGmInverter(){
        return $this->belongsTo('App\Models\PLTSGMInverter');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
