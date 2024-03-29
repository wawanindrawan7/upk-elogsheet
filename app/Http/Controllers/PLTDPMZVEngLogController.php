<?php

namespace App\Http\Controllers;

use App\Models\PLTDPMUnit;
use App\Models\PLTDPMZVEngLog;
use App\Models\PLTDPMZVResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLTDPMZVEngLogController extends Controller
{
    public function view(Request $r)
    {
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $unit = PLTDPMUnit::find($r->unit_id);
        return view('pltd-pm.zv-eng-log', compact('unit', 'date'));
    }

    public function detail(Request $r)
    {
        $log = PLTDPMZVEngLog::with('users')->with('pltdPmUnit')->find($r->id);
        return $log;
    }

    public function loadData(Request $r)
    {
        if ($r->date != date('Y-m-d')) {
            $log = PLTDPMZVEngLog::with('users')->with('pltdPmUnit')->where('tanggal', $r->date)->where('pltd_pm_unit_id', $r->unit_id)->where('tanggal', $r->date)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDPMZVEngLog::with('users')->with('pltdPmUnit')->where('pltd_pm_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }

        return compact('log');
    }

    public function create(Request $in)
    {
        DB::beginTransaction();
        try {
            $lb = PLTDPMZVEngLog::orderBy('id', 'desc')->where('pltd_pm_unit_id', $in->pltd_pm_unit_id)->first();

            $log = new PLTDPMZVEngLog();
            $log->jam = $in['jam'];
            $log->users_id = $in['users_id'];
            $log->pltd_pm_unit_id = $in['pltd_pm_unit_id'];
            $log->udmas_sisi_a = $in['udmas_sisi_a'];
            $log->udmas_sisi_b = $in['udmas_sisi_b'];
            $log->oli_masmes_a = $in['oli_masmes_a'];
            $log->oli_masmes_b = $in['oli_masmes_b'];
            $log->oli_rad_mas = $in['oli_rad_mas'];
            $log->oli_rad_kel = $in['oli_rad_kel'];
            $log->air_pen_masmes_a = $in['air_pen_masmes_a'];
            $log->air_pen_masmes_b = $in['air_pen_masmes_b'];
            $log->air_pen_rad_mas = $in['air_pen_rad_mas'];
            $log->air_pen_rad_kel = $in['air_pen_rad_kel'];
            $log->air_pen_inj_mas = $in['air_pen_inj_mas'];
            $log->air_pen_inj_kel = $in['air_pen_inj_kel'];
            $log->air_pen_kel_silsis_1a = $in['air_pen_kel_silsis_1a'];
            $log->air_pen_kel_silsis_2a = $in['air_pen_kel_silsis_2a'];
            $log->air_pen_kel_silsis_3a = $in['air_pen_kel_silsis_3a'];
            $log->air_pen_kel_silsis_4a = $in['air_pen_kel_silsis_4a'];
            $log->air_pen_kel_silsis_5a = $in['air_pen_kel_silsis_5a'];
            $log->air_pen_kel_silsis_6a = $in['air_pen_kel_silsis_6a'];
            $log->air_pen_kel_silsis_1b = $in['air_pen_kel_silsis_1b'];
            $log->air_pen_kel_silsis_2b = $in['air_pen_kel_silsis_2b'];
            $log->air_pen_kel_silsis_3b = $in['air_pen_kel_silsis_3b'];
            $log->air_pen_kel_silsis_4b = $in['air_pen_kel_silsis_4b'];
            $log->air_pen_kel_silsis_5b = $in['air_pen_kel_silsis_5b'];
            $log->air_pen_kel_silsis_6b = $in['air_pen_kel_silsis_6b'];
            $log->gas_buang_kel_silsis_1a = $in['gas_buang_kel_silsis_1a'];
            $log->gas_buang_kel_silsis_2a = $in['gas_buang_kel_silsis_2a'];
            $log->gas_buang_kel_silsis_3a = $in['gas_buang_kel_silsis_3a'];
            $log->gas_buang_kel_silsis_4a = $in['gas_buang_kel_silsis_4a'];
            $log->gas_buang_kel_silsis_5a = $in['gas_buang_kel_silsis_5a'];
            $log->gas_buang_kel_silsis_6a = $in['gas_buang_kel_silsis_6a'];
            $log->gas_buang_kel_silsis_1b = $in['gas_buang_kel_silsis_1b'];
            $log->gas_buang_kel_silsis_2b = $in['gas_buang_kel_silsis_2b'];
            $log->gas_buang_kel_silsis_3b = $in['gas_buang_kel_silsis_3b'];
            $log->gas_buang_kel_silsis_4b = $in['gas_buang_kel_silsis_4b'];
            $log->gas_buang_kel_silsis_5b = $in['gas_buang_kel_silsis_5b'];
            $log->gas_buang_kel_silsis_6b = $in['gas_buang_kel_silsis_6b'];
            $log->main_bearing_1 = $in['main_bearing_1'];
            $log->main_bearing_2 = $in['main_bearing_2'];
            $log->main_bearing_3 = $in['main_bearing_3'];
            $log->main_bearing_4 = $in['main_bearing_4'];
            $log->main_bearing_5 = $in['main_bearing_5'];
            $log->main_bearing_6 = $in['main_bearing_6'];
            $log->main_bearing_7 = $in['main_bearing_7'];
            $log->main_bearing_8 = $in['main_bearing_8'];
            $log->main_bearing_9 = $in['main_bearing_9'];
            $log->turbo_mas_a_mas = $in['turbo_mas_a_mas'];
            $log->turbo_mas_a_kel = $in['turbo_mas_a_kel'];
            $log->turbo_mas_b_mas = $in['turbo_mas_b_mas'];
            $log->turbo_mas_b_kel = $in['turbo_mas_b_kel'];
            $log->turbo_kel_a = $in['turbo_kel_a'];
            $log->turbo_kel_b = $in['turbo_kel_b'];
            $log->temp_air_pen_kel_mes = $in['temp_air_pen_kel_mes'];
            $log->temp_bah_bak_mas_mes = $in['temp_bah_bak_mas_mes'];
            $log->rack_bahan_bakar = $in['rack_bahan_bakar'];
            $log->gov_load_limit = $in['gov_load_limit'];
            $log->tek_udara_start = $in['tek_udara_start'];
            $log->tek_pres_udmas_sisi_a = $in['tek_pres_udmas_sisi_a'];
            $log->tek_pres_udmas_sisi_b = $in['tek_pres_udmas_sisi_b'];
            $log->tek_udara_masuk_a_b = $in['tek_udara_masuk_a_b'];
            $log->tek_bah_bak_mas_mes = $in['tek_bah_bak_mas_mes'];
            $log->tek_minyak_pelumas = $in['tek_minyak_pelumas'];
            $log->tek_air_pen_mes = $in['tek_air_pen_mes'];
            $log->tek_air_pen_inj = $in['tek_air_pen_inj'];
            $log->tek_ud_mas_dis_sisi_a = $in['tek_ud_mas_dis_sisi_a'];
            $log->tek_ud_mas_dis_sisi_b = $in['tek_ud_mas_dis_sisi_b'];
            $log->put_turbo_sisi_a = $in['put_turbo_sisi_a'];
            $log->put_turbo_sisi_b = $in['put_turbo_sisi_b'];
            $log->tek_oli_separator = $in['tek_oli_separator'];
            $log->ampere_pompa_ali = $in['ampere_pompa_ali'];
            $log->ampere_pompa_jw = $in['ampere_pompa_jw'];
            $log->sikap_flow_meter_bahan_bakar_in = $in['sikap_flow_meter_bahan_bakar_in'];
            $log->sikap_flow_meter_bahan_bakar_return = $in['sikap_flow_meter_bahan_bakar_return'];
            $log->sikap_flow_meter_bahan_bakar_hsd = $in['sikap_flow_meter_bahan_bakar_hsd'];
            $log->tanggal = date("Y-m-d");
            $log->time_check = date("Y-m-d H:i:s");
            // $log->pltd_pl_id = $in['pltd_pl_id'];
            $log->save();

            $cek = PLTDPMZVResume::where('pltd_pm_unit_id', $log->pltd_pm_unit_id)->where('jam', $log->jam)->where('tanggal', $log->tanggal)->first();
            if ($cek == null) {
                $resume = new PLTDPMZVResume();
                $resume->pltd_pm_unit_id = $log->pltd_pm_unit_id;
                $resume->jam = $log->jam;
                $resume->tanggal = $log->tanggal;
                $resume->pemakaian = $log->sikap_flow_meter_bahan_bakar_in - $log->sikap_flow_meter_bahan_bakar_return;
                $hsd = ($lb != null) ? ($log->sikap_flow_meter_bahan_bakar_hsd - $lb->sikap_flow_meter_bahan_bakar_hsd) : $log->sikap_flow_meter_bahan_bakar_hsd;
                
                $resume->hsd = ($hsd < 0) ? 0 : $hsd;
                $resume->save();
            } else {
                $resume = PLTDPMZVResume::find($cek->id);
                $resume->pemakaian = $log->sikap_flow_meter_bahan_bakar_in - $log->sikap_flow_meter_bahan_bakar_return;
                $hsd = ($lb != null) ? ($log->sikap_flow_meter_bahan_bakar_hsd - $lb->sikap_flow_meter_bahan_bakar_hsd) : $log->sikap_flow_meter_bahan_bakar_hsd;
                
                $resume->hsd = ($hsd < 0) ? 0 : $hsd;
                // $resume->sfc = ($resume->kwh_prod >= 0) ? ($resume->pemakaian + $resume->hsd) / $resume->kwh_prod : 0;
                $resume->save();
            }
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function edit(Request $in)
    {
        DB::beginTransaction();
        try {
            

            $log = PLTDPMZVEngLog::find($in->id);
            $log->jam = $in['jam'];
            $log->udmas_sisi_a = $in['udmas_sisi_a'];
            $log->udmas_sisi_b = $in['udmas_sisi_b'];
            $log->oli_masmes_a = $in['oli_masmes_a'];
            $log->oli_masmes_b = $in['oli_masmes_b'];
            $log->oli_rad_mas = $in['oli_rad_mas'];
            $log->oli_rad_kel = $in['oli_rad_kel'];
            $log->air_pen_masmes_a = $in['air_pen_masmes_a'];
            $log->air_pen_masmes_b = $in['air_pen_masmes_b'];
            $log->air_pen_rad_mas = $in['air_pen_rad_mas'];
            $log->air_pen_rad_kel = $in['air_pen_rad_kel'];
            $log->air_pen_inj_mas = $in['air_pen_inj_mas'];
            $log->air_pen_inj_kel = $in['air_pen_inj_kel'];
            $log->air_pen_kel_silsis_1a = $in['air_pen_kel_silsis_1a'];
            $log->air_pen_kel_silsis_2a = $in['air_pen_kel_silsis_2a'];
            $log->air_pen_kel_silsis_3a = $in['air_pen_kel_silsis_3a'];
            $log->air_pen_kel_silsis_4a = $in['air_pen_kel_silsis_4a'];
            $log->air_pen_kel_silsis_5a = $in['air_pen_kel_silsis_5a'];
            $log->air_pen_kel_silsis_6a = $in['air_pen_kel_silsis_6a'];
            $log->air_pen_kel_silsis_1b = $in['air_pen_kel_silsis_1b'];
            $log->air_pen_kel_silsis_2b = $in['air_pen_kel_silsis_2b'];
            $log->air_pen_kel_silsis_3b = $in['air_pen_kel_silsis_3b'];
            $log->air_pen_kel_silsis_4b = $in['air_pen_kel_silsis_4b'];
            $log->air_pen_kel_silsis_5b = $in['air_pen_kel_silsis_5b'];
            $log->air_pen_kel_silsis_6b = $in['air_pen_kel_silsis_6b'];
            $log->gas_buang_kel_silsis_1a = $in['gas_buang_kel_silsis_1a'];
            $log->gas_buang_kel_silsis_2a = $in['gas_buang_kel_silsis_2a'];
            $log->gas_buang_kel_silsis_3a = $in['gas_buang_kel_silsis_3a'];
            $log->gas_buang_kel_silsis_4a = $in['gas_buang_kel_silsis_4a'];
            $log->gas_buang_kel_silsis_5a = $in['gas_buang_kel_silsis_5a'];
            $log->gas_buang_kel_silsis_6a = $in['gas_buang_kel_silsis_6a'];
            $log->gas_buang_kel_silsis_1b = $in['gas_buang_kel_silsis_1b'];
            $log->gas_buang_kel_silsis_2b = $in['gas_buang_kel_silsis_2b'];
            $log->gas_buang_kel_silsis_3b = $in['gas_buang_kel_silsis_3b'];
            $log->gas_buang_kel_silsis_4b = $in['gas_buang_kel_silsis_4b'];
            $log->gas_buang_kel_silsis_5b = $in['gas_buang_kel_silsis_5b'];
            $log->gas_buang_kel_silsis_6b = $in['gas_buang_kel_silsis_6b'];
            $log->main_bearing_1 = $in['main_bearing_1'];
            $log->main_bearing_2 = $in['main_bearing_2'];
            $log->main_bearing_3 = $in['main_bearing_3'];
            $log->main_bearing_4 = $in['main_bearing_4'];
            $log->main_bearing_5 = $in['main_bearing_5'];
            $log->main_bearing_6 = $in['main_bearing_6'];
            $log->main_bearing_7 = $in['main_bearing_7'];
            $log->main_bearing_8 = $in['main_bearing_8'];
            $log->main_bearing_9 = $in['main_bearing_9'];
            $log->turbo_mas_a_mas = $in['turbo_mas_a_mas'];
            $log->turbo_mas_a_kel = $in['turbo_mas_a_kel'];
            $log->turbo_mas_b_mas = $in['turbo_mas_b_mas'];
            $log->turbo_mas_b_kel = $in['turbo_mas_b_kel'];
            $log->turbo_kel_a = $in['turbo_kel_a'];
            $log->turbo_kel_b = $in['turbo_kel_b'];
            $log->temp_air_pen_kel_mes = $in['temp_air_pen_kel_mes'];
            $log->temp_bah_bak_mas_mes = $in['temp_bah_bak_mas_mes'];
            $log->rack_bahan_bakar = $in['rack_bahan_bakar'];
            $log->gov_load_limit = $in['gov_load_limit'];
            $log->tek_udara_start = $in['tek_udara_start'];
            $log->tek_pres_udmas_sisi_a = $in['tek_pres_udmas_sisi_a'];
            $log->tek_pres_udmas_sisi_b = $in['tek_pres_udmas_sisi_b'];
            $log->tek_udara_masuk_a_b = $in['tek_udara_masuk_a_b'];
            $log->tek_bah_bak_mas_mes = $in['tek_bah_bak_mas_mes'];
            $log->tek_minyak_pelumas = $in['tek_minyak_pelumas'];
            $log->tek_air_pen_mes = $in['tek_air_pen_mes'];
            $log->tek_air_pen_inj = $in['tek_air_pen_inj'];
            $log->tek_ud_mas_dis_sisi_a = $in['tek_ud_mas_dis_sisi_a'];
            $log->tek_ud_mas_dis_sisi_b = $in['tek_ud_mas_dis_sisi_b'];
            $log->put_turbo_sisi_a = $in['put_turbo_sisi_a'];
            $log->put_turbo_sisi_b = $in['put_turbo_sisi_b'];
            $log->tek_oli_separator = $in['tek_oli_separator'];
            $log->ampere_pompa_ali = $in['ampere_pompa_ali'];
            $log->ampere_pompa_jw = $in['ampere_pompa_jw'];
            $log->sikap_flow_meter_bahan_bakar_in = $in['sikap_flow_meter_bahan_bakar_in'];
            $log->sikap_flow_meter_bahan_bakar_return = $in['sikap_flow_meter_bahan_bakar_return'];
            $log->sikap_flow_meter_bahan_bakar_hsd = $in['sikap_flow_meter_bahan_bakar_hsd'];
            $log->tanggal = $in['tanggal'];
            $log->time_check = date("Y-m-d H:i:s");
            // $log->pltd_pl_id = $in['pltd_pl_id'];
            $log->save();

            
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
