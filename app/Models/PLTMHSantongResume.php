<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHSantongResume extends Model
{
    use HasFactory;
    protected $table = 'pltmh_santong_resume';
    public $timestamps = false;

    public function pltmhSantongLogsheet(){
        return $this->belongsTo('App\Models\PLTMHSantongLogsheet');
    }
}
