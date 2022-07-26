<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDPMOgfLog extends Model
{
    use HasFactory;
    protected $table = 'pltd_pm_ogf_log';
    public $timestamps = false;

    public function pltdPmUnit(){
        return $this->belongsTo('App\Models\PLTDPMUnit');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
