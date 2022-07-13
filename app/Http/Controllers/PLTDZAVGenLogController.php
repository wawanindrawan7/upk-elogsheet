<?php

namespace App\Http\Controllers;

use App\Models\PLTDUnit;
use App\Models\PLTDZAVGenLog;
use Illuminate\Http\Request;

class PLTDZAVGenLogController extends Controller
{
    public function view(Request $r){
        $unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.zav-gen-log', compact('unit'));
    }

	public function detail(Request $r){
		$log = PLTDZAVGenLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
		if($r->date == null){
			$log = PLTDZAVGenLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->get();
		}else{
			$log = PLTDZAVGenLog::with('users')->with('pltdUnit')->where('tanggal', $r->date)->where('pltd_unit_id', $r->unit_id)->get();
		}
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDZAVGenLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->pltd_unit_id = $in['pltd_unit_id'];
		$log->teg = $in['teg'];
		$log->freq = $in['freq'];
		$log->faktor_daya = $in['faktor_daya'];
		$log->daya_semu = $in['daya_semu'];
		$log->beban = $in['beban'];
		$log->arus_ka_r = $in['arus_ka_r'];
		$log->arus_ka_s = $in['arus_ka_s'];
		$log->arus_ka_t = $in['arus_ka_t'];
		$log->excit_arus = $in['excit_arus'];
		$log->excit_teg = $in['excit_teg'];
		$log->bearing = $in['bearing'];
		$log->kwh_produksi_hsd = $in['kwh_produksi_hsd'];
		$log->kwh_produksi_mfo = $in['kwh_produksi_mfo'];
		$log->kwh_alat_bantu = $in['kwh_alat_bantu'];
		$log->level_becoms = $in['level_becoms'];
		$log->arus_a_r = $in['arus_a_r'];
		$log->arus_a_s = $in['arus_a_s'];
		$log->arus_a_t = $in['arus_a_t'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
        $log->save();
        return 'success';
    }
}
