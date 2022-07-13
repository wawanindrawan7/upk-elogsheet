<?php

namespace App\Http\Controllers;

use App\Models\PLTDUnit;
use Illuminate\Http\Request;

class LogsheetController extends Controller
{
    //
    public function niigataDashboard(){
        $unit = PLTDUnit::all();
        return view('pltd-amp.niigata-dashboard',compact('unit'));
    }
}
