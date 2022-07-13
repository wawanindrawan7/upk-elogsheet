<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDZVGenLog extends Model
{
    use HasFactory;

    protected $table='pltd_zv_gen_log';
    public $timestamps = false;

    public function pltdUnit(){
        return $this->belongsTo('App\Models\PLTDUnit');
    }
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
