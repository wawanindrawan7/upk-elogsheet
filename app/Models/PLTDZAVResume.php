<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDZAVResume extends Model
{
    use HasFactory;
    protected $table = 'pltd_zav_resume';
    public $timestamps = false;

    public function pltdUnit()
    {
        return $this->belongsTo('App\Models\PLTDUnit');
    }
}
