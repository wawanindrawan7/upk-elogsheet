<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSInverter extends Model
{
    use HasFactory;
    protected $table = 'plts_inverter';
    public $timestamps = false;

    public function pltsLogsheet(){
        return $this->hasMany('App\Models\PLTSLogsheet');
    }
}
