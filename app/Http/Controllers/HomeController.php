<?php

namespace App\Http\Controllers;

use App\Models\PLTDNiigataResume;
use App\Models\PLTDPMZVResume;
use App\Models\PLTDZAVResume;
use App\Models\PLTDZVResume;
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

        $jam = ["01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00",
		"12:00", "13:00", "14:00", "15:00","05:30", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

		$data_chart = [];
		foreach ($jam as $j) {
            $sfc = 0;

            $amp2 = PLTDZVResume::where('pltd_unit_id', 1)->where('tanggal', $date)->where('jam', $j)->first();
            $amp2_sfc = ($amp2 != null && ($amp2->kwh_prod != 0 || $amp2->kwh_prod != null)) ? (($amp2->pemakaian + $amp2->hsd) / $amp2->kwh_prod) : 0;

            $amp3 = PLTDZVResume::where('pltd_unit_id', 2)->where('tanggal', $date)->where('jam', $j)->first();
            $amp3_sfc = ($amp3 != null && ($amp3->kwh_prod != 0 || $amp3->kwh_prod != null)) ? (($amp3->pemakaian + $amp3->hsd) / $amp3->kwh_prod) : 0;

            $amp4 = PLTDNiigataResume::where('pltd_unit_id', 3)->where('tanggal', $date)->where('jam', $j)->first();
            $amp4_sfc = ($amp4 != null && ($amp4->kwh_prod != 0 || $amp4->kwh_prod != null)) ? (($amp4->pemakaian + $amp4->hsd) / $amp4->kwh_prod) : 0;

            $amp5 = PLTDZAVResume::where('pltd_unit_id', 4)->where('tanggal', $date)->where('jam', $j)->first();
            $amp5_sfc = ($amp5 != null && ($amp5->kwh_prod != 0 || $amp5->kwh_prod != null)) ? (($amp5->pemakaian + $amp5->hsd) / $amp5->kwh_prod) : 0;

            $amp6 = PLTDZAVResume::where('pltd_unit_id', 5)->where('tanggal', $date)->where('jam', $j)->first();
            $amp6_sfc = ($amp6 != null && ($amp6->kwh_prod != 0 || $amp6->kwh_prod != null)) ? (($amp6->pemakaian + $amp6->hsd) / $amp6->kwh_prod) : 0;

            $amp7 = PLTDZAVResume::where('pltd_unit_id', 6)->where('tanggal', $date)->where('jam', $j)->first();
            $amp7_sfc = ($amp7 != null && ($amp7->kwh_prod != 0 || $amp7->kwh_prod != null)) ? (($amp7->pemakaian + $amp7->hsd) / $amp7->kwh_prod) : 0;

            $amp8 = PLTDZAVResume::where('pltd_unit_id', 7)->where('tanggal', $date)->where('jam', $j)->first();
            $amp8_sfc = ($amp8 != null && ($amp8->kwh_prod != 0 || $amp8->kwh_prod != null)) ? (($amp8->pemakaian + $amp8->hsd) / $amp8->kwh_prod) : 0;


            $sfc = $amp2_sfc + $amp3_sfc + $amp4_sfc + $amp5_sfc + $amp6_sfc+ $amp7_sfc+ $amp8_sfc;

			array_push($data_chart, array(
				'jam' => $j,
                'sfc' => number_format($sfc, 2),
			));
			
		}

		// return $res;

        // AMP 2
        // $amp2_ld = '-';
        // $amp2_kwh_prod = 0;
        // $amp2_pemakaian = 0;
        // $amp2_sfc = 0;
        // $amp2 = PLTDZVResume::where('pltd_unit_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        // if(count($amp2) > 0){
        //     $amp2_ld = $amp2[0]->jam;
        //     $amp2_kwh_prod = $amp2->sum('kwh_prod');
        //     $amp2_pemakaian = $amp2->sum('pemakaian');
        //     $amp2_sfc = $amp2->sum('sfc');
        // }

       

       

        // return compact('narmada_kwh_prod','pengga_kwh_prod');
        return view('home',
            compact(
                'date',
                'data_chart',
            )
        );
    }

    public function ebtDashboard(Request $r)
    {
        $date = ($r->has('date')) ? $r->date : date('Y-m-d');

        $jam = ["01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00","12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "00:00"];
        $gt_data_chart = [];
        $ga_data_chart = [];
        $gm_data_chart = [];
        $data_chart = [];
		foreach ($jam as $j) {

            $g1 = PLTSResume::where('plts_inverter_id', 1)->where('tanggal', $date)->where('jam', $j)->first();
            $g2 = PLTSResume::where('plts_inverter_id', 2)->where('tanggal', $date)->where('jam', $j)->first();
            $g3 = PLTSResume::where('plts_inverter_id', 3)->where('tanggal', $date)->where('jam', $j)->first();

            $ga1 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 1)->where('tanggal', $date)->where('jam', $j)->first();
            $ga2 = PLTSGiliAirResume::where('plts_gili_air_inverter_id', 2)->where('tanggal', $date)->where('jam', $j)->first();

            $gm1 = PLTSGMResume::where('plts_gm_inverter_id', 1)->where('tanggal', $date)->where('jam', $j)->first();

            $g1_data = ($g1 != null && $g1->energy_today >= 0) ? $g1->energy_today : 0;
            $g2_data = ($g2 != null && $g2->energy_today >= 0) ? $g2->energy_today : 0;
            $g3_data = ($g3 != null && $g3->energy_today >= 0) ? $g3->energy_today : 0;
            
            $ga1_data = ($ga1 != null && $ga1->energy_today >= 0) ? $ga1->energy_today : 0;
            $ga2_data = ($ga2 != null && $ga2->energy_today >= 0) ? $ga2->energy_today : 0;

            $gm1_data = ($gm1 != null && $gm1->energy_today >= 0) ? $gm1->energy_today : 0;

            array_push($gt_data_chart, array(
                'jam' => $j,
                'energy_today' => ($g1_data + $g2_data + $g3_data)
            ));

            array_push($ga_data_chart, array(
                'jam' => $j,
                'energy_today' => ($ga1_data + $ga2_data)
            ));

            array_push($gm_data_chart, array(
                'jam' => $j,
                'energy_today' => ($gm1_data)
            ));

            array_push($data_chart, array(
                'jam' => $j,
                'energy_today' => ($g1_data + $g2_data + $g3_data + $ga1_data + $ga2_data + $gm1_data)
            ));

        }

        return view('ebt-home', compact('gt_data_chart','ga_data_chart','gm_data_chart', 'data_chart'));
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
