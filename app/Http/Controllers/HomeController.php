<?php

namespace App\Http\Controllers;

use App\Models\PLTMHNarmadaLogsheet;
use App\Models\PLTMHNarmadaResume;
use App\Models\PLTMHPenggaLogsheet;
use App\Models\PLTMHPenggaResume;
use App\Models\PLTMHSantongLogsheet;
use App\Models\PLTMHSantongResume;
use App\Models\PLTSGALogsheet;
use App\Models\PLTSGiliAirResume;
use App\Models\PLTSGMLogsheet;
use App\Models\PLTSGMResume;
use App\Models\PLTSLogsheet;
use App\Models\PLTSResume;
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
    public function index(Request $r)
    {
        $date = ($r->has('date')) ? $r->date : date('Y-m-d');

        // PLTMH NARMADA
        $narmada_ld = '-';
        $narmada_kwh_prod = 0; 
        $narmada_kwh_ps = 0; 
        $narmada = PLTMHNarmadaResume::where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($narmada) > 0){
            $narmada_ld = $narmada[0]->jam;
            $narmada_kwh_prod = $narmada->sum('kwh_produksi');
            $narmada_kwh_ps = $narmada->sum('kwh_ps');
        }

        // PLTMH NARMADA
        $pengga_ld = '-';
        $pengga_kwh_prod = 0; 
        $pengga_kwh_ps = 0; 
        $pengga = PLTMHPenggaResume::where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($pengga) > 0){
            $pengga_ld = $pengga[0]->jam;
            $pengga_kwh_prod = $pengga->sum('kwh_produksi');; 
            $pengga_kwh_ps = $pengga->sum('kwh_ps');;
        }

        // PLTMH SANTONG
        $santong_ld = '-';
        $santong_kwh_prod = 0; 
        $santong_kwh_ps = 0; 
        $santong = PLTMHSantongResume::where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($santong) > 0){
            $santong_ld = $santong[0]->jam;
            $santong_kwh_prod = $santong->sum('kwh_produksi');
            $santong_kwh_ps = $santong->sum('kwh_ps');
        }

        // Gili Trawangan
        $gt1_ld = '-';
        $gt1_energy_today = 0; 
        $gt1_kwh_ps = 0; 
        $gt1 = PLTSResume::where('plts_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt1) > 0){
            $gt1_ld = $gt1[0]->jam;
            $gt1_energy_today = $gt1->sum('energy_today');
            $gt1_kwh_ps = $gt1->sum('kwh_ps');
        }

        $gt2_ld = '-';
        $gt2_energy_today = 0; 
        $gt2_kwh_ps = 0; 
        $gt2 = PLTSResume::where('plts_inverter_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt2) > 0){
            $gt2_ld = $gt2[0]->jam;
            $gt2_energy_today = $gt2->sum('energy_today');
            $gt2_kwh_ps = $gt2->sum('kwh_ps');
        }

        $gt3_ld = '-';
        $gt3_energy_today = 0; 
        $gt3_kwh_ps = 0; 
        $gt3 = PLTSResume::where('plts_inverter_id', 3)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt3) > 0){
            $gt3_ld = $gt3[0]->jam;
            $gt3_energy_today = $gt3->sum('energy_today');
            $gt3_kwh_ps = $gt3->sum('kwh_ps');
        }

        //PLTS GILI AIR
        $ga1_ld = '-';
        $ga1_energy_today = 0; 
        $ga1_kwh_ps = 0; 
        $ga1 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($ga1) > 0){
            $ga1_ld = $ga1[0]->jam;
            $ga1_energy_today = $ga1->sum('energy_today');
            $ga1_kwh_ps = $ga1->sum('kwh_ps');
        }

        $ga2_ld = '-';
        $ga2_energy_today = 0; 
        $ga2_kwh_ps = 0; 
        $ga2 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($ga2) > 0){
            $ga2_ld = $ga2[0]->jam;
            $ga2_energy_today = $ga2->sum('energy_today');
            $ga2_kwh_ps = $ga2->sum('kwh_ps');
        }

        //PLTS GILI MENO
        $gm1_ld = '-';
        $gm1_energy_today = 0; 
        $gm1_kwh_ps = 0; 
        $gm1 = PLTSGMResume::where('plts_gm_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gm1) > 0){
            $gm1_ld = $gm1[0]->jam;
            $gm1_energy_today = $gm1->sum('energy_today');
            $gm1_kwh_ps = $gm1->sum('kwh_ps');
        }

        // return compact('narmada_kwh_prod','pengga_kwh_prod');
        return view('home', 
            compact(
                'narmada_kwh_prod','narmada_kwh_ps','narmada_ld',
                'pengga_kwh_prod','pengga_kwh_ps','pengga_ld',
                'santong_kwh_prod','santong_kwh_ps','santong_ld',
                'gt1_energy_today','gt1_kwh_ps','gt1_ld',
                'gt2_energy_today','gt2_kwh_ps','gt2_ld',
                'gt3_energy_today','gt3_kwh_ps','gt3_ld',
                'ga1_energy_today','ga1_kwh_ps','ga1_ld',
                'ga2_energy_today','ga2_kwh_ps','ga2_ld',
                'gm1_energy_today','gm1_kwh_ps','gm1_ld',
            )
        );
    }

    public function restDashboard(Request $r)
    {
        $date = ($r->has('date')) ? $r->date : date('Y-m-d');

        // PLTMH NARMADA
        $narmada_ld = '-';
        $narmada_kwh_prod = 0; 
        $narmada_kwh_ps = 0; 
        $narmada = PLTMHNarmadaResume::where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($narmada) > 0){
            $narmada_ld = $narmada[0]->jam;
            $narmada_kwh_prod = $narmada->sum('kwh_produksi');
            $narmada_kwh_ps = $narmada->sum('kwh_ps');
        }

        // PLTMH NARMADA
        $pengga_ld = '-';
        $pengga_kwh_prod = 0; 
        $pengga_kwh_ps = 0; 
        $pengga = PLTMHPenggaResume::where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($pengga) > 0){
            $pengga_ld = $pengga[0]->jam;
            $pengga_kwh_prod = $pengga->sum('kwh_produksi');; 
            $pengga_kwh_ps = $pengga->sum('kwh_ps');;
        }

        // PLTMH SANTONG
        $santong_ld = '-';
        $santong_kwh_prod = 0; 
        $santong_kwh_ps = 0; 
        $santong = PLTMHSantongResume::where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($santong) > 0){
            $santong_ld = $santong[0]->jam;
            $santong_kwh_prod = $santong->sum('kwh_produksi');
            $santong_kwh_ps = $santong->sum('kwh_ps');
        }

        // Gili Trawangan
        $gt1_ld = '-';
        $gt1_energy_today = 0; 
        $gt1_kwh_ps = 0; 
        $gt1 = PLTSResume::where('plts_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt1) > 0){
            $gt1_ld = $gt1[0]->jam;
            $gt1_energy_today = $gt1->sum('energy_today');
            $gt1_kwh_ps = $gt1->sum('kwh_ps');
        }

        $gt2_ld = '-';
        $gt2_energy_today = 0; 
        $gt2_kwh_ps = 0; 
        $gt2 = PLTSResume::where('plts_inverter_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt2) > 0){
            $gt2_ld = $gt2[0]->jam;
            $gt2_energy_today = $gt2->sum('energy_today');
            $gt2_kwh_ps = $gt2->sum('kwh_ps');
        }

        $gt3_ld = '-';
        $gt3_energy_today = 0; 
        $gt3_kwh_ps = 0; 
        $gt3 = PLTSResume::where('plts_inverter_id', 3)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gt3) > 0){
            $gt3_ld = $gt3[0]->jam;
            $gt3_energy_today = $gt3->sum('energy_today');
            $gt3_kwh_ps = $gt3->sum('kwh_ps');
        }

        //PLTS GILI AIR
        $ga1_ld = '-';
        $ga1_energy_today = 0; 
        $ga1_kwh_ps = 0; 
        $ga1 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($ga1) > 0){
            $ga1_ld = $ga1[0]->jam;
            $ga1_energy_today = $ga1->sum('energy_today');
            $ga1_kwh_ps = $ga1->sum('kwh_ps');
        }

        $ga2_ld = '-';
        $ga2_energy_today = 0; 
        $ga2_kwh_ps = 0; 
        $ga2 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($ga2) > 0){
            $ga2_ld = $ga2[0]->jam;
            $ga2_energy_today = $ga2->sum('energy_today');
            $ga2_kwh_ps = $ga2->sum('kwh_ps');
        }

        //PLTS GILI MENO
        $gm1_ld = '-';
        $gm1_energy_today = 0; 
        $gm1_kwh_ps = 0; 
        $gm1 = PLTSGMResume::where('plts_gm_inverter_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        //jika ada record 
        if(count($gm1) > 0){
            $gm1_ld = $gm1[0]->jam;
            $gm1_energy_today = $gm1->sum('energy_today');
            $gm1_kwh_ps = $gm1->sum('kwh_ps');
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
