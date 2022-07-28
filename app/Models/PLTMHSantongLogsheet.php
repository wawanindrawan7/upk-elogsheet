<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHSantongLogsheet extends Model
{
    use HasFactory;
    protected $table = 'pltmh_santong_logsheet';
    public $timestamps = false;

    public function pltmhSantongGenerator(){
        return $this->belongsTo('App\Models\PLTMHSantongGenerator');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
