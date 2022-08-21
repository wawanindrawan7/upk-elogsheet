<?php

namespace App\Http\Controllers;

use App\Models\PLTDNiigataEngLog;
use App\Models\PLTDUnit;
use Illuminate\Http\Request;

class PLTDNiigataEngLogController extends Controller
{
    public function view(Request $r)
    {
        //inisasi tgl ke view
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.niigata-eng-log', compact('unit', 'date'));
    }

    public function detail(Request $r)
    {
        $log = PLTDNiigataEngLog::with('users')->with('pltdUnit')->find($r->id);
        return $log;
    }

    public function loadData(Request $r)
    {
        if ($r->date != date('Y-m-d')) {
            $log = PLTDNiigataEngLog::with('users')->with('pltdUnit')->where('tanggal', $r->date)->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDNiigataEngLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }

        return compact('log');
    }

    public function create(Request $in)
    {
        // return $in->all();
        $log = new PLTDNiigataEngLog();
        $log->pltd_unit_id = $in->pltd_unit_id;
        $log->users_id = $in['users_id'];
        $log->jam = $in['jam'];
        $log->tanggal = date("Y-m-d");
        $log->time_check = date("Y-m-d H:i:s");
        $log->tek_air_pen_mas_mes = $in['tek_air_pen_mas_mes'];
        $log->tek_air_pen_mas_inter = $in['tek_air_pen_mas_inter'];
        $log->tek_minyak_pelumas_mas_mes = $in['tek_minyak_pelumas_mas_mes'];
        $log->tek_udara_bilas_a = $in['tek_udara_bilas_a'];
        $log->tek_udara_bilas_b = $in['tek_udara_bilas_b'];
        $log->tek_bah_bak_mas_mes = $in['tek_bah_bak_mas_mes'];
        $log->tek_minyak_pelumas_tuas_katup = $in['tek_minyak_pelumas_tuas_katup'];
        $log->tek_minyak_pend_injektor = $in['tek_minyak_pend_injektor'];
        $log->gas_buang = $in['gas_buang'];
        $log->load_limit_gov = $in['load_limit_gov'];
        $log->rack_bahan_bakar_sil_a_1a = $in['rack_bahan_bakar_sil_a_1a'];
        $log->rack_bahan_bakar_sil_a_2a = $in['rack_bahan_bakar_sil_a_2a'];
        $log->rack_bahan_bakar_sil_a_3a = $in['rack_bahan_bakar_sil_a_3a'];
        $log->rack_bahan_bakar_sil_a_4a = $in['rack_bahan_bakar_sil_a_4a'];
        $log->rack_bahan_bakar_sil_a_5a = $in['rack_bahan_bakar_sil_a_5a'];
        $log->rack_bahan_bakar_sil_a_6a = $in['rack_bahan_bakar_sil_a_6a'];
        $log->rack_bahan_bakar_sil_b_1b = $in['rack_bahan_bakar_sil_b_1b'];
        $log->rack_bahan_bakar_sil_b_2b = $in['rack_bahan_bakar_sil_b_2b'];
        $log->rack_bahan_bakar_sil_b_3b = $in['rack_bahan_bakar_sil_b_3b'];
        $log->rack_bahan_bakar_sil_b_4b = $in['rack_bahan_bakar_sil_b_4b'];
        $log->rack_bahan_bakar_sil_b_5b = $in['rack_bahan_bakar_sil_b_5b'];
        $log->rack_bahan_bakar_sil_b_6b = $in['rack_bahan_bakar_sil_b_6b'];
        $log->temp_bah_bak_mas_mes = $in['temp_bah_bak_mas_mes'];
        $log->temp_minyak_pen_inj_masuk = $in['temp_minyak_pen_inj_masuk'];
        $log->temp_minyak_pen_inj_keluar = $in['temp_minyak_pen_inj_keluar'];
        $log->temp_air_pen_kel_sil_a_1a = $in['temp_air_pen_kel_sil_a_1a'];
        $log->temp_air_pen_kel_sil_a_2a = $in['temp_air_pen_kel_sil_a_2a'];
        $log->temp_air_pen_kel_sil_a_3a = $in['temp_air_pen_kel_sil_a_3a'];
        $log->temp_air_pen_kel_sil_a_4a = $in['temp_air_pen_kel_sil_a_4a'];
        $log->temp_air_pen_kel_sil_a_5a = $in['temp_air_pen_kel_sil_a_5a'];
        $log->temp_air_pen_kel_sil_a_6a = $in['temp_air_pen_kel_sil_a_6a'];
        $log->temp_air_pen_kel_sil_b_1b = $in['temp_air_pen_kel_sil_b_1b'];
        $log->temp_air_pen_kel_sil_b_2b = $in['temp_air_pen_kel_sil_b_2b'];
        $log->temp_air_pen_kel_sil_b_3b = $in['temp_air_pen_kel_sil_b_3b'];
        $log->temp_air_pen_kel_sil_b_4b = $in['temp_air_pen_kel_sil_b_4b'];
        $log->temp_air_pen_kel_sil_b_5b = $in['temp_air_pen_kel_sil_b_5b'];
        $log->temp_air_pen_kel_sil_b_6b = $in['temp_air_pen_kel_sil_b_6b'];
        $log->temp_udara_mas_inter_a = $in['temp_udara_mas_inter_a'];
        $log->temp_udara_mas_inter_b = $in['temp_udara_mas_inter_b'];
        $log->temp_udara_kel_inter_a = $in['temp_udara_kel_inter_a'];
        $log->temp_udara_kel_inter_b = $in['temp_udara_kel_inter_b'];
        $log->temp_udara_masuk_filter = $in['temp_udara_masuk_filter'];
        $log->temp_rad_minyak_pel_masuk = $in['temp_rad_minyak_pel_masuk'];
        $log->temp_rad_minyak_pel_keluar = $in['temp_rad_minyak_pel_keluar'];
        $log->temp_rad_air_pend_mes_masuk = $in['temp_rad_air_pend_mes_masuk'];
        $log->temp_rad_air_pend_mes_keluar = $in['temp_rad_air_pend_mes_keluar'];
        $log->temp_rad_air_pend_inter_masuk = $in['temp_rad_air_pend_inter_masuk'];
        $log->temp_rad_air_pend_inter_keluar = $in['temp_rad_air_pend_inter_keluar'];
        $log->temp_minyak_pel_masmes = $in['temp_minyak_pel_masmes'];
        $log->kwh_ps = $in['kwh_ps'];
        $log->kwh_hsd = $in['kwh_hsd'];
        $log->kwh_mfo = $in['kwh_mfo'];
        $log->stand_flow_meter_hsd = $in['stand_flow_meter_hsd'];
        $log->stand_flow_meter_mfo_in = $in['stand_flow_meter_mfo_in'];
        $log->stand_flow_meter_mfo_return = $in['stand_flow_meter_mfo_return'];
        $log->save();

        return 'success';
    }
}
