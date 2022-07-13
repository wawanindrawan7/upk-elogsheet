<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLTSLogsheet extends Model
{
    use HasFactory;
    protected $table = 'plts_logsheet';
    public $timestamps = false;
}
