<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSResume extends Model
{
    use HasFactory;
    protected $table = 'plts_resume';
    public $timestamps = false;

    public function pltsInverter(){
        return $this->belongsTo('App\Models\PLTSInverter');
    }

    public function pltsLogsheet(){
        return $this->belongsTo('App\Models\PLTSLogsheet');
    }
}
