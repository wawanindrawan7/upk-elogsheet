<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHNarmadaResume extends Model
{
    use HasFactory;

    protected $table = 'pltmh_narmada_resume';
    public $timestamps = false;

    public function pltmhNarmadaLogsheet(){
        return $this->belongsTo('App\Models\PLTMHNarmadaLogsheet');
    }
}
