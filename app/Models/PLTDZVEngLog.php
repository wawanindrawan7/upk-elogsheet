<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDZVEngLog extends Model
{
    use HasFactory;
    protected $table='pltd_zv_eng';
    public $timestamps = false;

    public function pltdUnit(){
        return $this->belongsTo('App\Models\PLTDUnit');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
