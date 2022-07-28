<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHNarmadaLogsheet extends Model
{
    use HasFactory;
    protected $table = 'pltmh_narmada_logsheet';
    public $timestamps = false;

    public function pltmhNarmadaGenerator(){
        return $this->belongsTo('App\Models\PLTMHNarmadaGenerator');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
