<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHPenggaGenerator extends Model
{
    use HasFactory;
    protected $table = 'pltmh_pengga_generator';
    public $timestamps = false;

    public function pltmhPenggaLogsheet(){
        return $this->hasMany('App\Models\PLTMHPenggaLogsheet');
    }
}
