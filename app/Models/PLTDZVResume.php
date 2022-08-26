<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDZVResume extends Model
{
    use HasFactory;
    protected $table='pltd_zv_resume';
    public $timestamps = false;

    public function pltdUnit(){
        return $this->belongsTo('App\Models\PLTDUnit');
    }
}
