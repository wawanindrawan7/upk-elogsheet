<?php

namespace App\Http\Controllers;

use App\Models\PLTDUnit;
use App\Models\PLTDZAVEngLog;
use Illuminate\Http\Request;

class PLTDZAVEngLogController extends Controller
{
    public function view(Request $r){
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.zav-eng-log',compact('unit','date'));
    }

	public function detail(Request $r){
		$log = PLTDZAVEngLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
        if ($r->date != date('Y-m-d')) {
            $log = PLTDZAVEngLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->where('tanggal', $r->date)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDZAVEngLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDZAVEngLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->pltd_unit_id = $in['pltd_unit_id'];
		$log->tanggal = date("Y-m-d");
		$log->time_check = date("Y-m-d H:i:s");
		$log->temp_ud_mas_dis_sis_a = $in['temp_ud_mas_dis_sis_a'];
		$log->temp_ud_mas_dis_sis_b = $in['temp_ud_mas_dis_sis_b'];
		$log->temp_minyak_pel_mas_mes_sis_a = $in['temp_minyak_pel_mas_mes_sis_a'];
		$log->temp_minyak_pel_mas_mes_sis_b = $in['temp_minyak_pel_mas_mes_sis_b'];
		$log->temp_minyak_pel_oil_cooler_masuk = $in['temp_minyak_pel_oil_cooler_masuk'];
		$log->temp_minyak_pel_oil_cooler_keluar = $in['temp_minyak_pel_oil_cooler_keluar'];
		$log->temp_minyak_pel_masuk_filter = $in['temp_minyak_pel_masuk_filter'];
		$log->temp_raw_mater_inter_cooler_sisi_a_masuk = $in['temp_raw_mater_inter_cooler_sisi_a_masuk'];
		$log->temp_raw_mater_inter_cooler_sisi_a_keluar = $in['temp_raw_mater_inter_cooler_sisi_a_keluar'];
		$log->temp_raw_mater_inter_cooler_sisi_b_masuk = $in['temp_raw_mater_inter_cooler_sisi_b_masuk'];
		$log->temp_raw_mater_inter_cooler_sisi_b_keluar = $in['temp_raw_mater_inter_cooler_sisi_b_keluar'];
		$log->temp_raw_mater_oil_cooler_masuk = $in['temp_raw_mater_oil_cooler_masuk'];
		$log->temp_raw_mater_oil_cooler_keluar = $in['temp_raw_mater_oil_cooler_keluar'];
		$log->temp_raw_mater_rad_masuk = $in['temp_raw_mater_rad_masuk'];
		$log->temp_raw_mater_rad_keluar = $in['temp_raw_mater_rad_keluar'];
		$log->temp_air_pen_inj_masuk = $in['temp_air_pen_inj_masuk'];
		$log->temp_air_pen_inj_keluar = $in['temp_air_pen_inj_keluar'];
		$log->temp_bah_bak_mas_mes = $in['temp_bah_bak_mas_mes'];
		$log->temp_bah_bak_mas_flow_meter = $in['temp_bah_bak_mas_flow_meter'];
		$log->temp_bah_bak_mas_pompa = $in['temp_bah_bak_mas_pompa'];
		$log->temp_air_pen_mes_mas_mes_sisi_a = $in['temp_air_pen_mes_mas_mes_sisi_a'];
		$log->temp_air_pen_mes_mas_mes_sisi_b = $in['temp_air_pen_mes_mas_mes_sisi_b'];
		$log->temp_air_pen_mes_mas_flow_inter_sisi_a = $in['temp_air_pen_mes_mas_flow_inter_sisi_a'];
		$log->temp_air_pen_mes_mas_flow_inter_sisi_b = $in['temp_air_pen_mes_mas_flow_inter_sisi_b'];
		$log->temp_air_pen_mes_rad_masuk = $in['temp_air_pen_mes_rad_masuk'];
		$log->temp_air_pen_mes_rad_keluar = $in['temp_air_pen_mes_rad_keluar'];
		$log->temp_air_pen_mes_kel_sil_a_1a = $in['temp_air_pen_mes_kel_sil_a_1a'];
		$log->temp_air_pen_mes_kel_sil_a_2a = $in['temp_air_pen_mes_kel_sil_a_2a'];
		$log->temp_air_pen_mes_kel_sil_a_3a = $in['temp_air_pen_mes_kel_sil_a_3a'];
		$log->temp_air_pen_mes_kel_sil_a_4a = $in['temp_air_pen_mes_kel_sil_a_4a'];
		$log->temp_air_pen_mes_kel_sil_a_5a = $in['temp_air_pen_mes_kel_sil_a_5a'];
		$log->temp_air_pen_mes_kel_sil_a_6a = $in['temp_air_pen_mes_kel_sil_a_6a'];
		$log->temp_air_pen_mes_kel_sil_b_1b = $in['temp_air_pen_mes_kel_sil_b_1b'];
		$log->temp_air_pen_mes_kel_sil_b_2b = $in['temp_air_pen_mes_kel_sil_b_2b'];
		$log->temp_air_pen_mes_kel_sil_b_3b = $in['temp_air_pen_mes_kel_sil_b_3b'];
		$log->temp_air_pen_mes_kel_sil_b_4b = $in['temp_air_pen_mes_kel_sil_b_4b'];
		$log->temp_air_pen_mes_kel_sil_b_5b = $in['temp_air_pen_mes_kel_sil_b_5b'];
		$log->temp_air_pen_mes_kel_sil_b_6b = $in['temp_air_pen_mes_kel_sil_b_6b'];
		$log->temp_air_pen_mes_keluar_mesin = $in['temp_air_pen_mes_keluar_mesin'];
		$log->rack_bahan_bakar = $in['rack_bahan_bakar'];
		$log->tek_udara_start = $in['tek_udara_start'];
		$log->tek_pres_udmas_sisi_a = $in['tek_pres_udmas_sisi_a'];
		$log->tek_pres_udmas_sisi_b = $in['tek_pres_udmas_sisi_b'];
		$log->tek_udara_masuk = $in['tek_udara_masuk'];
		$log->tek_bahan_bakar = $in['tek_bahan_bakar'];
		$log->tek_minyak_pelumas = $in['tek_minyak_pelumas'];
		$log->tek_air_pen_mesin = $in['tek_air_pen_mesin'];
		$log->tek_air_pen_inj = $in['tek_air_pen_inj'];
		$log->tek_raw_water_keluar_pompa = $in['tek_raw_water_keluar_pompa'];
		$log->tek_udara_masuk_dis_a = $in['tek_udara_masuk_dis_a'];
		$log->tek_udara_masuk_dis_b = $in['tek_udara_masuk_dis_b'];
		$log->tek_oli_separator = $in['tek_oli_separator'];
		$log->level_tangki_bbm_har = $in['level_tangki_bbm_har'];
		$log->level_tangki_bbm_buffer = $in['level_tangki_bbm_buffer'];
		$log->level_oli_sump_tank = $in['level_oli_sump_tank'];
		$log->sikap_flow_meter_bahan_bakar_in = $in['sikap_flow_meter_bahan_bakar_in'];
		$log->sikap_flow_meter_bahan_bakar_return = $in['sikap_flow_meter_bahan_bakar_return'];
		$log->sikap_flow_meter_bahan_bakar_hsd = $in['sikap_flow_meter_bahan_bakar_hsd'];
        $log->save();
        return 'success';
    }
}
