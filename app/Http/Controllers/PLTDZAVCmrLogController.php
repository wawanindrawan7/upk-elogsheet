<?php

namespace App\Http\Controllers;

use App\Models\PLTDUnit;
use App\Models\PLTDZAVCmrLog;
use Illuminate\Http\Request;

class PLTDZAVCmrLogController extends Controller
{
    public function view(Request $r){
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.zav-cmr-log',compact('unit','date'));
    }

	public function detail(Request $r){
		$log = PLTDZAVCmrLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
        if ($r->date != date('Y-m-d')) {
            $log = PLTDZAVCmrLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->where('tanggal', $r->date)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDZAVCmrLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDZAVCmrLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->pltd_unit_id = $in['pltd_unit_id'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
		$log->udara_start = $in['udara_start'];
		$log->air_pen_mesin = $in['air_pen_mesin'];
		$log->air_pen_injektor = $in['air_pen_injektor'];
		$log->raw_water = $in['raw_water'];
		$log->minyak_pelumas = $in['minyak_pelumas'];
		$log->bahan_bakar = $in['bahan_bakar'];
		$log->udara_masuk = $in['udara_masuk'];
		$log->temp_gas_buang_kel_sil_sisi_a_1 = $in['temp_gas_buang_kel_sil_sisi_a_1'];
		$log->temp_gas_buang_kel_sil_sisi_a_2 = $in['temp_gas_buang_kel_sil_sisi_a_2'];
		$log->temp_gas_buang_kel_sil_sisi_a_3 = $in['temp_gas_buang_kel_sil_sisi_a_3'];
		$log->temp_gas_buang_kel_sil_sisi_a_4 = $in['temp_gas_buang_kel_sil_sisi_a_4'];
		$log->temp_gas_buang_kel_sil_sisi_a_5 = $in['temp_gas_buang_kel_sil_sisi_a_5'];
		$log->temp_gas_buang_kel_sil_sisi_a_6 = $in['temp_gas_buang_kel_sil_sisi_a_6'];
		$log->temp_gas_buang_kel_sil_sisi_b_1 = $in['temp_gas_buang_kel_sil_sisi_b_1'];
		$log->temp_gas_buang_kel_sil_sisi_b_2 = $in['temp_gas_buang_kel_sil_sisi_b_2'];
		$log->temp_gas_buang_kel_sil_sisi_b_3 = $in['temp_gas_buang_kel_sil_sisi_b_3'];
		$log->temp_gas_buang_kel_sil_sisi_b_4 = $in['temp_gas_buang_kel_sil_sisi_b_4'];
		$log->temp_gas_buang_kel_sil_sisi_b_5 = $in['temp_gas_buang_kel_sil_sisi_b_5'];
		$log->temp_gas_buang_kel_sil_sisi_b_6 = $in['temp_gas_buang_kel_sil_sisi_b_6'];
		$log->temp_gas_buang_turbo_a_masuk = $in['temp_gas_buang_turbo_a_masuk'];
		$log->temp_gas_buang_turbo_a_keluar = $in['temp_gas_buang_turbo_a_keluar'];
		$log->temp_gas_buang_turbo_b_masuk = $in['temp_gas_buang_turbo_b_masuk'];
		$log->temp_gas_buang_turbo_b_keluar = $in['temp_gas_buang_turbo_b_keluar'];
		$log->temp_air_pen_mes = $in['temp_air_pen_mes'];
		$log->temp_air_pen_inj = $in['temp_air_pen_inj'];
		$log->temp_minyak_pelumas = $in['temp_minyak_pelumas'];
		$log->temp_bahan_bakar = $in['temp_bahan_bakar'];
		$log->temp_raw_water = $in['temp_raw_water'];
		$log->temp_udara_masuk = $in['temp_udara_masuk'];
		$log->temp_bearing_gen_1 = $in['temp_bearing_gen_1'];
		$log->temp_bearing_gen_2 = $in['temp_bearing_gen_2'];
		$log->temp_trust_bearing = $in['temp_trust_bearing'];
		$log->temp_main_bearing_1 = $in['temp_main_bearing_1'];
		$log->temp_main_bearing_2 = $in['temp_main_bearing_2'];
		$log->temp_main_bearing_3 = $in['temp_main_bearing_3'];
		$log->temp_main_bearing_4 = $in['temp_main_bearing_4'];
		$log->temp_main_bearing_5 = $in['temp_main_bearing_5'];
		$log->temp_main_bearing_6 = $in['temp_main_bearing_6'];
		$log->temp_main_bearing_7 = $in['temp_main_bearing_7'];
		$log->temp_stator_1 = $in['temp_stator_1'];
		$log->temp_stator_2 = $in['temp_stator_2'];
		$log->temp_stator_3 = $in['temp_stator_3'];
		$log->temp_stator_4 = $in['temp_stator_4'];
		$log->temp_stator_5 = $in['temp_stator_5'];
		$log->temp_stator_6 = $in['temp_stator_6'];
		$log->put_turbo_a = $in['put_turbo_a'];
		$log->put_turbo_b = $in['put_turbo_b'];
        $log->save();
        return 'success';
    }
}
