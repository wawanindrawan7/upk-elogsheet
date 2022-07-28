<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHSantongGenerator extends Model
{
    use HasFactory;

    protected $table = 'pltmh_santong_generator';
    public $timestamps = false;

    public function pltmhSantongLogsheet(){
        return $this->hasMany('App\Models\PLTMHSantongLogsheet');
    }
}
