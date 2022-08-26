<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDPMZVResume extends Model
{
    use HasFactory;
    protected $table = 'pltd_pm_zv_resume';
    public $timestamps = false;

    public function pltdPmUnit(){
        return $this->belongsTo('App\Models\PLTDPMUnit');
    }
}
