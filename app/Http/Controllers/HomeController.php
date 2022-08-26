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

        // AMP 2
        $amp2_ld = '-';
        $amp2_kwh_prod = 0;
        $amp2_pemakaian = 0;
        $amp2_sfc = 0;
        $amp2 = PLTDZVResume::where('pltd_unit_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp2) > 0){
            $amp2_ld = $amp2[0]->jam;
            $amp2_kwh_prod = $amp2->sum('kwh_prod');
            $amp2_pemakaian = $amp2->sum('pemakaian');
            $amp2_sfc = $amp2->sum('sfc');
        }

        // AMP 3
        $amp3_ld = '-';
        $amp3_kwh_prod = 0;
        $amp3_pemakaian = 0;
        $amp3_sfc = 0;
        $amp3 = PLTDZVResume::where('pltd_unit_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp3) > 0){
            $amp3_ld = $amp3[0]->jam;
            $amp3_kwh_prod = $amp3->sum('kwh_prod');
            $amp3_pemakaian = $amp3->sum('pemakaian');
            $amp3_sfc = $amp3->sum('sfc');
        }

        // AMP 4
        $amp4_ld = '-';
        $amp4_kwh_prod = 0;
        $amp4_pemakaian = 0;
        $amp4_sfc = 0;
        $amp4 = PLTDNiigataResume::where('pltd_unit_id', 3)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp4) > 0){
            $amp4_ld = $amp4[0]->jam;
            $amp4_kwh_prod = $amp4->sum('kwh_prod');
            $amp4_pemakaian = $amp4->sum('pemakaian');
            $amp4_sfc = $amp4->sum('sfc');
        }

        // AMP 5
        $amp5_ld = '-';
        $amp5_kwh_prod = 0;
        $amp5_pemakaian = 0;
        $amp5_sfc = 0;
        $amp5 = PLTDZAVResume::where('pltd_unit_id', 4)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp5) > 0){
            $amp5_ld = $amp5[0]->jam;
            $amp5_kwh_prod = $amp5->sum('kwh_prod');
            $amp5_pemakaian = $amp5->sum('pemakaian');
            $amp5_sfc = $amp5->sum('sfc');
        }

        // AMP 6
        $amp6_ld = '-';
        $amp6_kwh_prod = 0;
        $amp6_pemakaian = 0;
        $amp6_sfc = 0;
        $amp6 = PLTDZAVResume::where('pltd_unit_id', 5)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp6) > 0){
            $amp6_ld = $amp6[0]->jam;
            $amp6_kwh_prod = $amp6->sum('kwh_prod');
            $amp6_pemakaian = $amp6->sum('pemakaian');
            $amp6_sfc = $amp6->sum('sfc');
        }

        // AMP 7
        $amp7_ld = '-';
        $amp7_kwh_prod = 0;
        $amp7_pemakaian = 0;
        $amp7_sfc = 0;
        $amp7 = PLTDZAVResume::where('pltd_unit_id', 6)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp7) > 0){
            $amp7_ld = $amp7[0]->jam;
            $amp7_kwh_prod = $amp7->sum('kwh_prod');
            $amp7_pemakaian = $amp7->sum('pemakaian');
            $amp7_sfc = $amp7->sum('sfc');
        }

        // AMP 8
        $amp8_ld = '-';
        $amp8_kwh_prod = 0;
        $amp8_pemakaian = 0;
        $amp8_sfc = 0;
        $amp8 = PLTDZAVResume::where('pltd_unit_id', 7)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($amp8) > 0){
            $amp8_ld = $amp8[0]->jam;
            $amp8_kwh_prod = $amp8->sum('kwh_prod');
            $amp8_pemakaian = $amp8->sum('pemakaian');
            $amp8_sfc = $amp8->sum('sfc');
        }

        // PM 2
        $pm2_ld = '-';
        $pm2_kwh_prod = 0;
        $pm2_pemakaian = 0;
        $pm2_sfc = 0;
        $pm2 = PLTDPMZVResume::where('pltd_pm_unit_id', 1)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($pm2) > 0){
            $pm2_ld = $pm2[0]->jam;
            $pm2_kwh_prod = $pm2->sum('kwh_prod');
            $pm2_pemakaian = $pm2->sum('pemakaian');
            $pm2_sfc = $pm2->sum('sfc');
        }

        // PM 3
        $pm3_ld = '-';
        $pm3_kwh_prod = 0;
        $pm3_pemakaian = 0;
        $pm3_sfc = 0;
        $pm3 = PLTDPMZVResume::where('pltd_pm_unit_id', 2)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($pm3) > 0){
            $pm3_ld = $pm3[0]->jam;
            $pm3_kwh_prod = $pm3->sum('kwh_prod');
            $pm3_pemakaian = $pm3->sum('pemakaian');
            $pm3_sfc = $pm3->sum('sfc');
        }

        // PM 4
        $pm4_ld = '-';
        $pm4_kwh_prod = 0;
        $pm4_pemakaian = 0;
        $pm4_sfc = 0;
        $pm4 = PLTDPMZVResume::where('pltd_pm_unit_id', 3)->where('tanggal', $date)->orderBy('id','desc')->get();
        if(count($pm4) > 0){
            $pm4_ld = $pm4[0]->jam;
            $pm4_kwh_prod = $pm4->sum('kwh_prod');
            $pm4_pemakaian = $pm4->sum('pemakaian');
            $pm4_sfc = $pm4->sum('sfc');
        }

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
                'amp2_kwh_prod','amp2_pemakaian','amp2_sfc',
                'amp3_kwh_prod','amp3_pemakaian','amp3_sfc',
                'amp4_kwh_prod','amp4_pemakaian','amp4_sfc',
                'amp5_kwh_prod','amp5_pemakaian','amp5_sfc',
                'amp6_kwh_prod','amp6_pemakaian','amp6_sfc',
                'amp7_kwh_prod','amp7_pemakaian','amp7_sfc',
                'amp8_kwh_prod','amp8_pemakaian','amp8_sfc',
                'pm2_kwh_prod','pm2_pemakaian','pm2_sfc',
                'pm3_kwh_prod','pm3_pemakaian','pm3_sfc',
                'pm4_kwh_prod','pm4_pemakaian','pm4_sfc',
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
