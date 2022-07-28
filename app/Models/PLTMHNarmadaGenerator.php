<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHNarmadaGenerator extends Model
{
    use HasFactory;

    protected $table = 'pltmh_narmada_generator';
    public $timestamps = false;

    public function pltmhNarmadaLogsheet(){
        return $this->hasMany('App\Models\PLTMHNarmadaLogsheet');
    }
}
