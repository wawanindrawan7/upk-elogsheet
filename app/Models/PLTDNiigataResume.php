<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTDNiigataResume extends Model
{
    use HasFactory;
    protected $table = 'pltd_niigata_resume';
    public $timestamps = false;

    public function pltdUnit()
    {
        return $this->belongsTo('App\Models\PLTDUnit');
    }
}
