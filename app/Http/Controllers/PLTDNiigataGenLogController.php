<?php

namespace App\Http\Controllers;

use App\Models\PLTDNiigataGenLog;
use App\Models\PLTDUnit;
use Illuminate\Http\Request;

class PLTDNiigataGenLogController extends Controller
{
    //
    public function view(Request $r){
        //inisasi tgl ke view
		$date = $r->has('date') ? $r->date : date('Y-m-d');
		$unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.niigata-gen-log', compact('unit','date'));
    }

	public function detail(Request $r){
		$log = PLTDNiigataGenLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
        if ($r->date != date('Y-m-d')) {
            $log = PLTDNiigataGenLog::with('users')->with('pltdUnit')->where('tanggal', $r->date)->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDNiigataGenLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }

		return compact('log');
	}

    public function create(Request $in)
    {
        // return $in->all();
        $log = new PLTDNiigataGenLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->pltd_unit_id = $in->pltd_unit_id;
		$log->teg = $in['teg'];
		$log->freq = $in['freq'];
		$log->faktor_daya = $in['faktor_daya'];
		$log->daya_semu = $in['daya_semu'];
		$log->beban = $in['beban'];
		$log->arus_r = $in['arus_r'];
		$log->arus_s = $in['arus_s'];
		$log->arus_t = $in['arus_t'];
		$log->excit_arus = $in['excit_arus'];
		$log->excit_teg = $in['excit_teg'];
		$log->winding_1 = $in['winding_1'];
		$log->winding_2 = $in['winding_2'];
		$log->winding_3 = $in['winding_3'];
		$log->bearing = $in['bearing'];
		$log->pug_masuk = $in['pug_masuk'];
		$log->put_turbo_a = $in['put_turbo_a'];
		$log->put_turbo_b = $in['put_turbo_b'];
		$log->pug_keluar = $in['pug_keluar'];
		$log->sikap_kwh_meter = $in['sikap_kwh_meter'];
		$log->level_becom = $in['level_becom'];
		$log->r = $in['r'];
		$log->s = $in['s'];
		$log->t = $in['t'];
		$log->mw = $in['mw'];
		$log->air_pen_mes_masuk = $in['air_pen_mes_masuk'];
		$log->air_pen_mes_keluar = $in['air_pen_mes_keluar'];
		$log->minyak_pelumas_masuk = $in['minyak_pelumas_masuk'];
		$log->minyak_pelumas_keluar = $in['minyak_pelumas_keluar'];
		$log->udara_bilas_a = $in['udara_bilas_a'];
		$log->udara_bilas_b = $in['udara_bilas_b'];
		$log->air_pen_ud_mas = $in['air_pen_ud_mas'];
		$log->gas_buang_sil_sis_a1 = $in['gas_buang_sil_sis_a1'];
		$log->gas_buang_sil_sis_a2 = $in['gas_buang_sil_sis_a2'];
		$log->gas_buang_sil_sis_a3 = $in['gas_buang_sil_sis_a3'];
		$log->gas_buang_sil_sis_a4 = $in['gas_buang_sil_sis_a4'];
		$log->gas_buang_sil_sis_a5 = $in['gas_buang_sil_sis_a5'];
		$log->gas_buang_sil_sis_a6 = $in['gas_buang_sil_sis_a6'];
		$log->gas_buang_sil_sis_b1 = $in['gas_buang_sil_sis_b1'];
		$log->gas_buang_sil_sis_b2 = $in['gas_buang_sil_sis_b2'];
		$log->gas_buang_sil_sis_b3 = $in['gas_buang_sil_sis_b3'];
		$log->gas_buang_sil_sis_b4 = $in['gas_buang_sil_sis_b4'];
		$log->gas_buang_sil_sis_b5 = $in['gas_buang_sil_sis_b5'];
		$log->gas_buang_sil_sis_b6 = $in['gas_buang_sil_sis_b6'];
		$log->turbo_la = $in['turbo_la'];
		$log->turbo_lb = $in['turbo_lb'];
		$log->turbo_ra = $in['turbo_ra'];
		$log->turbo_rb = $in['turbo_rb'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
        $log->save();
        return 'success';
    }

    public function edit(Request $in)
    {
        // return $in->all();
        $log = PLTDNiigataGenLog::find($in->id);
		$log->jam = $in['jam'];
		// $log->users_id = $in['users_id'];
		// $log->pltd_unit_id = $in->pltd_unit_id;
		$log->teg = $in['teg'];
		$log->freq = $in['freq'];
		$log->faktor_daya = $in['faktor_daya'];
		$log->daya_semu = $in['daya_semu'];
		$log->beban = $in['beban'];
		$log->arus_r = $in['arus_r'];
		$log->arus_s = $in['arus_s'];
		$log->arus_t = $in['arus_t'];
		$log->excit_arus = $in['excit_arus'];
		$log->excit_teg = $in['excit_teg'];
		$log->winding_1 = $in['winding_1'];
		$log->winding_2 = $in['winding_2'];
		$log->winding_3 = $in['winding_3'];
		$log->bearing = $in['bearing'];
		$log->pug_masuk = $in['pug_masuk'];
		$log->put_turbo_a = $in['put_turbo_a'];
		$log->put_turbo_b = $in['put_turbo_b'];
		$log->pug_keluar = $in['pug_keluar'];
		$log->sikap_kwh_meter = $in['sikap_kwh_meter'];
		$log->level_becom = $in['level_becom'];
		$log->r = $in['r'];
		$log->s = $in['s'];
		$log->t = $in['t'];
		$log->mw = $in['mw'];
		$log->air_pen_mes_masuk = $in['air_pen_mes_masuk'];
		$log->air_pen_mes_keluar = $in['air_pen_mes_keluar'];
		$log->minyak_pelumas_masuk = $in['minyak_pelumas_masuk'];
		$log->minyak_pelumas_keluar = $in['minyak_pelumas_keluar'];
		$log->udara_bilas_a = $in['udara_bilas_a'];
		$log->udara_bilas_b = $in['udara_bilas_b'];
		$log->air_pen_ud_mas = $in['air_pen_ud_mas'];
		$log->gas_buang_sil_sis_a1 = $in['gas_buang_sil_sis_a1'];
		$log->gas_buang_sil_sis_a2 = $in['gas_buang_sil_sis_a2'];
		$log->gas_buang_sil_sis_a3 = $in['gas_buang_sil_sis_a3'];
		$log->gas_buang_sil_sis_a4 = $in['gas_buang_sil_sis_a4'];
		$log->gas_buang_sil_sis_a5 = $in['gas_buang_sil_sis_a5'];
		$log->gas_buang_sil_sis_a6 = $in['gas_buang_sil_sis_a6'];
		$log->gas_buang_sil_sis_b1 = $in['gas_buang_sil_sis_b1'];
		$log->gas_buang_sil_sis_b2 = $in['gas_buang_sil_sis_b2'];
		$log->gas_buang_sil_sis_b3 = $in['gas_buang_sil_sis_b3'];
		$log->gas_buang_sil_sis_b4 = $in['gas_buang_sil_sis_b4'];
		$log->gas_buang_sil_sis_b5 = $in['gas_buang_sil_sis_b5'];
		$log->gas_buang_sil_sis_b6 = $in['gas_buang_sil_sis_b6'];
		$log->turbo_la = $in['turbo_la'];
		$log->turbo_lb = $in['turbo_lb'];
		$log->turbo_ra = $in['turbo_ra'];
		$log->turbo_rb = $in['turbo_rb'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = $in['tanggal'];
        $log->save();
        return 'success';
    }
}
