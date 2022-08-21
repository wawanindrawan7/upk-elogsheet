<?php

namespace App\Http\Controllers;

use App\Models\PLTMHNarmadaLogsheet;
use App\Models\PLTMHPenggaLogsheet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // PLTMH NARMADA
        $narmada_kwh_prod = 0; 
        $narmada = PLTMHNarmadaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        if(count($narmada) > 0){
            $r1 = $narmada[0]->kwh_prod_exp;
            if(count($narmada) > 1){
                $narmada_kwh_prod = $r1 - $narmada[1]->kwh_prod_exp;
            }else{
                $narmada_kwh_prod = $r1;
            }
        }
        // PLTMH NARMADA
        $pengga_kwh_prod = 0; 
        $pengga = PLTMHPenggaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($pengga) > 0){
            $r1 = $pengga[0]->kwh_prod_exp;
            //jika lebih dari 1 record
            if(count($pengga) > 1){
                $pengga_kwh_prod = $r1 - $pengga[1]->kwh_prod_exp;
            }else{
                //jika hanya 1 record
                $pengga_kwh_prod = $r1;
            }
        }

        return compact('narmada_kwh_prod','pengga_kwh_prod');
        return view('home', compact('narmada_kwh_prod','pengga_kwh_prod'));
    }
}
