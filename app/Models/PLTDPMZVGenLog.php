<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDPMZVGenLog extends Model
{
    use HasFactory;

    protected $table = 'pltd_pm_zv_gen_log';
    public $timestamps = false;

    public function pltdPmUnit(){
        return $this->belongsTo('App\Models\PLTDPMUnit');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
