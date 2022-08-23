<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTMHPenggaResume extends Model
{
    use HasFactory;

    protected $table = 'pltmh_pengga_resume';
    public $timestamps = false;

    public function pltmhPenggaLogsheet(){
        return $this->belongsTo('App\Models\PLTMHPenggaLogsheet');
    }
}
