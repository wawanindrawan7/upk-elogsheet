<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHPenggaLogsheet extends Model
{
    use HasFactory;
    protected $table = 'pltmh_pengga_logsheet';
    public $timestamps = false;

    public function pltmhPenggaGenerator(){
        return $this->belongsTo('App\Models\PLTMHPenggaGenerator');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
