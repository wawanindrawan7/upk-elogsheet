<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDZAVEngLog extends Model
{
    use HasFactory;
    protected $table='pltd_zav_eng_log';
    public $timestamps = false;

    public function pltdUnit(){
        return $this->belongsTo('App\Models\PLTDUnit');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
