<?php

namespace App\Http\Controllers;

use App\Models\PLTMHNarmadaLogsheet;
use App\Models\PLTMHPenggaLogsheet;
use App\Models\PLTMHSantongLogsheet;
use App\Models\PLTSGALogsheet;
use App\Models\PLTSGMLogsheet;
use App\Models\PLTSLogsheet;
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
        $this->middleware('auth')->except(['restDashboard']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // PLTMH NARMADA
        $narmada_ld = '-';
        $narmada_kwh_prod = 0; 
        $narmada_kwh_ps = 0; 
        $narmada = PLTMHNarmadaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        if(count($narmada) > 0){
            $r1 = $narmada[0];
            $narmada_ld = $r1->tanggal;

            if(count($narmada) > 1){
                $narmada_kwh_prod = $r1->kwh_prod_exp - $narmada[1]->kwh_prod_exp;
                $narmada_kwh_ps = $r1->kwh_ps - $narmada[1]->kwh_ps;
            }else{
                $narmada_kwh_prod = $r1->kwh_prod_exp;
                $narmada_kwh_ps = $r1->kwh_ps;
            }
        }

        // PLTMH NARMADA
        $pengga_ld = '-';
        $pengga_kwh_prod = 0; 
        $pengga_kwh_ps = 0; 
        $pengga = PLTMHPenggaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($pengga) > 0){
            $r1 = $pengga[0];
            $pengga_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($pengga) > 1){
                $pengga_kwh_prod = $r1->kwh_prod_exp - $pengga[1]->kwh_prod_exp;
                $pengga_kwh_ps = $r1->kwh_ps - $pengga[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $pengga_kwh_prod = $r1->kwh_prod_exp;
                $pengga_kwh_ps = $r1->kwh_ps;
            }
        }

        // PLTMH SANTONG
        $santong_ld = '-';
        $santong_kwh_prod = 0; 
        $santong_kwh_ps = 0; 
        $santong = PLTMHSantongLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($santong) > 0){
            $r1 = $santong[0];
            $santong_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($santong) > 1){
                $santong_kwh_prod = $r1->kwh_prod_exp - $santong[1]->kwh_prod_exp;
                $santong_kwh_ps = $r1->kwh_ps - $santong[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $santong_kwh_prod = $r1->kwh_prod_exp;
                $santong_kwh_ps = $r1->kwh_ps;
            }
        }

        // Gili Trawangan
        $gt1_energy_today = 0; 
        $gt1_kwh_ps = 0; 
        $gt1 = PLTSLogsheet::where('plts_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt1) > 0){
            $r1 = $gt1[0];
            //jika lebih dari 1 record
            if(count($gt1) > 1){
                $gt1_energy_today = $r1->energy_today - $gt1[1]->energy_today;
                $gt1_kwh_ps = $r1->kwh_ps - $gt1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt1_energy_today = $r1->energy_today;
                $gt1_kwh_ps = $r1->kwh_ps;
            }
        }

        $gt2_energy_today = 0; 
        $gt2_kwh_ps = 0; 
        $gt2 = PLTSLogsheet::where('plts_inverter_id', 2)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt2) > 0){
            $r1 = $gt2[0];
            //jika lebih dari 1 record
            if(count($gt2) > 1){
                $gt2_energy_today = $r1->energy_today - $gt2[1]->energy_today;
                $gt2_kwh_ps = $r1->kwh_ps - $gt2[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt2_energy_today = $r1->energy_today;
                $gt2_kwh_ps = $r1->kwh_ps;
            }
        }

        $gt3_energy_today = 0; 
        $gt3_kwh_ps = 0; 
        $gt3 = PLTSLogsheet::where('plts_inverter_id', 3)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt3) > 0){
            $r1 = $gt3[0];
            //jika lebih dari 1 record
            if(count($gt3) > 1){
                $gt3_energy_today = $r1->energy_today - $gt3[1]->energy_today;
                $gt3_kwh_ps = $r1->kwh_ps - $gt3[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt3_energy_today = $r1->energy_today;
                $gt3_kwh_ps = $r1->kwh_ps;
            }
        }

        //PLTS GILI AIR
        $ga1_energy_today = 0; 
        $ga1_kwh_ps = 0; 
        $ga1 = PLTSGALogsheet::where('plts_gili_air_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($ga1) > 0){
            $r1 = $ga1[0];
            //jika lebih dari 1 record
            if(count($ga1) > 1){
                $ga1_energy_today = $r1->energy_today - $ga1[1]->energy_today;
                $ga1_kwh_ps = $r1->kwh_ps - $ga1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $ga1_energy_today = $r1->energy_today;
                $ga1_kwh_ps = $r1->kwh_ps;
            }
        }

        $ga2_energy_today = 0; 
        $ga2_kwh_ps = 0; 
        $ga2 = PLTSGALogsheet::where('plts_gili_air_inverter_id', 2)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($ga2) > 0){
            $r1 = $ga2[0];
            //jika lebih dari 1 record
            if(count($ga2) > 1){
                $ga2_energy_today = $r1->energy_today - $ga2[1]->energy_today;
                $ga2_kwh_ps = $r1->kwh_ps - $ga2[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $ga2_energy_today = $r1->energy_today;
                $ga2_kwh_ps = $r1->kwh_ps;
            }
        }

        //PLTS GILI MENO
        $gm1_energy_today = 0; 
        $gm1_kwh_ps = 0; 
        $gm1 = PLTSGMLogsheet::where('plts_gm_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gm1) > 0){
            $r1 = $gm1[0];
            //jika lebih dari 1 record
            if(count($gm1) > 1){
                $gm1_energy_today = $r1->energy_today - $gm1[1]->energy_today;
                $gm1_kwh_ps = $r1->kwh_ps - $gm1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gm1_energy_today = $r1->energy_today;
                $gm1_kwh_ps = $r1->kwh_ps;
            }
        }

        // return compact('narmada_kwh_prod','pengga_kwh_prod');
        return view('home', 
            compact(
                'narmada_kwh_prod','narmada_kwh_ps','narmada_ld',
                'pengga_kwh_prod','pengga_kwh_ps','pengga_ld',
                'santong_kwh_prod','santong_kwh_ps','santong_ld',
                'gt1_energy_today','gt1_kwh_ps',
                'gt2_energy_today','gt2_kwh_ps',
                'gt3_energy_today','gt3_kwh_ps',
                'ga1_energy_today','ga1_kwh_ps',
                'ga2_energy_today','ga2_kwh_ps',
                'gm1_energy_today','gm1_kwh_ps'
            )
        );
    }

    public function restDashboard(Request $r)
    {
        // PLTMH NARMADA
        $narmada_ld = '-';
        $narmada_kwh_prod = 0; 
        $narmada_kwh_ps = 0; 
        $narmada = PLTMHNarmadaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        if(count($narmada) > 0){
            $r1 = $narmada[0];
            $narmada_ld = $r1->tanggal;
            if(count($narmada) > 1){
                $narmada_kwh_prod = $r1->kwh_prod_exp - $narmada[1]->kwh_prod_exp;
                $narmada_kwh_ps = $r1->kwh_ps - $narmada[1]->kwh_ps;
            }else{
                $narmada_kwh_prod = $r1->kwh_prod_exp;
                $narmada_kwh_ps = $r1->kwh_ps;
            }
        }

        // PLTMH NARMADA
        $pengga_ld = '-';
        $pengga_kwh_prod = 0; 
        $pengga_kwh_ps = 0; 
        $pengga = PLTMHPenggaLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($pengga) > 0){
            $r1 = $pengga[0];
            $pengga_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($pengga) > 1){
                $pengga_kwh_prod = $r1->kwh_prod_exp - $pengga[1]->kwh_prod_exp;
                $pengga_kwh_ps = $r1->kwh_ps - $pengga[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $pengga_kwh_prod = $r1->kwh_prod_exp;
                $pengga_kwh_ps = $r1->kwh_ps;
            }
        }

        // PLTMH SANTONG
        $santong_ld = '-';
        $santong_kwh_prod = 0; 
        $santong_kwh_ps = 0; 
        $santong = PLTMHSantongLogsheet::orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($santong) > 0){
            $r1 = $santong[0];
            $santong_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($santong) > 1){
                $santong_kwh_prod = $r1->kwh_prod_exp - $santong[1]->kwh_prod_exp;
                $santong_kwh_ps = $r1->kwh_ps - $santong[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $santong_kwh_prod = $r1->kwh_prod_exp;
                $santong_kwh_ps = $r1->kwh_ps;
            }
        }

        // Gili Trawangan
        $gt1_ld = '-';
        $gt1_energy_today = 0; 
        $gt1_kwh_ps = 0; 
        $gt1 = PLTSLogsheet::where('plts_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt1) > 0){
            $r1 = $gt1[0];
            $gt1_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($gt1) > 1){
                $gt1_energy_today = $r1->energy_today - $gt1[1]->energy_today;
                $gt1_kwh_ps = $r1->kwh_ps - $gt1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt1_energy_today = $r1->energy_today;
                $gt1_kwh_ps = $r1->kwh_ps;
            }
        }

        $gt2_ld = '-';
        $gt2_energy_today = 0; 
        $gt2_kwh_ps = 0; 
        $gt2 = PLTSLogsheet::where('plts_inverter_id', 2)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt2) > 0){
            $r1 = $gt2[0];
             $gt2_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($gt2) > 1){
                $gt2_energy_today = $r1->energy_today - $gt2[1]->energy_today;
                $gt2_kwh_ps = $r1->kwh_ps - $gt2[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt2_energy_today = $r1->energy_today;
                $gt2_kwh_ps = $r1->kwh_ps;
            }
        }

        $gt3_ld = '-';
        $gt3_energy_today = 0; 
        $gt3_kwh_ps = 0; 
        $gt3 = PLTSLogsheet::where('plts_inverter_id', 3)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gt3) > 0){
            $r1 = $gt3[0];
             $gt3_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($gt3) > 1){
                $gt3_energy_today = $r1->energy_today - $gt3[1]->energy_today;
                $gt3_kwh_ps = $r1->kwh_ps - $gt3[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gt3_energy_today = $r1->energy_today;
                $gt3_kwh_ps = $r1->kwh_ps;
            }
        }

        //PLTS GILI AIR
        $ga1_ld = '-';
        $ga1_energy_today = 0; 
        $ga1_kwh_ps = 0; 
        $ga1 = PLTSGALogsheet::where('plts_gili_air_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($ga1) > 0){
            $r1 = $ga1[0];
            $ga1_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($ga1) > 1){
                $ga1_energy_today = $r1->energy_today - $ga1[1]->energy_today;
                $ga1_kwh_ps = $r1->kwh_ps - $ga1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $ga1_energy_today = $r1->energy_today;
                $ga1_kwh_ps = $r1->kwh_ps;
            }
        }

        $ga2_ld = '-';
        $ga2_energy_today = 0; 
        $ga2_kwh_ps = 0; 
        $ga2 = PLTSGALogsheet::where('plts_gili_air_inverter_id', 2)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($ga2) > 0){
            $r1 = $ga2[0];
            $ga2_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($ga2) > 1){
                $ga2_energy_today = $r1->energy_today - $ga2[1]->energy_today;
                $ga2_kwh_ps = $r1->kwh_ps - $ga2[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $ga2_energy_today = $r1->energy_today;
                $ga2_kwh_ps = $r1->kwh_ps;
            }
        }

        //PLTS GILI MENO
        $gm1_ld = '-';
        $gm1_energy_today = 0; 
        $gm1_kwh_ps = 0; 
        $gm1 = PLTSGMLogsheet::where('plts_gm_inverter_id', 1)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(3)->get();
        //jika ada record 
        if(count($gm1) > 0){
            $r1 = $gm1[0];
            $gm1_ld = $r1->tanggal;
            //jika lebih dari 1 record
            if(count($gm1) > 1){
                $gm1_energy_today = $r1->energy_today - $gm1[1]->energy_today;
                $gm1_kwh_ps = $r1->kwh_ps - $gm1[1]->kwh_ps;
            }else{
                //jika hanya 1 record
                $gm1_energy_today = $r1->energy_today;
                $gm1_kwh_ps = $r1->kwh_ps;
            }
        }

        return compact(
            'narmada_kwh_prod','narmada_kwh_ps','narmada_ld',
            'pengga_kwh_prod','pengga_kwh_ps','pengga_ld',
            'santong_kwh_prod','santong_kwh_ps','santong_ld',

            'gt1_energy_today','gt1_kwh_ps','gt1_ld',
            'gt2_energy_today','gt2_kwh_ps','gt2_ld',
            'gt3_energy_today','gt3_kwh_ps','gt3_ld',

            'ga1_energy_today','ga1_kwh_ps','ga1_ld',
            'ga2_energy_today','ga2_kwh_ps','ga2_ld',
            'gm1_energy_today','gm1_kwh_ps','gm1_ld'
        );
    }
}
