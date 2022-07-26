<?php

namespace App\Http\Controllers;

use App\Models\PLTDPMUnit;
use App\Models\PLTDPMZVGenLog;
use Illuminate\Http\Request;

class PLTDPMZVGenLogController extends Controller
{
    public function view(Request $r){
        $unit = PLTDPMUnit::find($r->unit_id);
        return view('pltd-pm.zv-gen-log', compact('unit'));
    }

	public function detail(Request $r){
		$log = PLTDPMZVGenLog::with('users')->with('pltdPmUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
		if($r->date == null){
			$log = PLTDPMZVGenLog::with('users')->with('pltdPmUnit')->where('pltd_pm_unit_id', $r->unit_id)->get();
		}else{
			$log = PLTDPMZVGenLog::with('users')->with('pltdPmUnit')->where('tanggal', $r->date)->where('pltd_pm_unit_id', $r->unit_id)->get();
		}
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDPMZVGenLog();
		$log->jam = $in['jam'];
		$log->pltd_pm_unit_id = $in['pltd_pm_unit_id'];
		$log->teg = $in['teg'];
		$log->freq = $in['freq'];
		$log->faktor_daya = $in['faktor_daya'];
		$log->daya_semu = $in['daya_semu'];
		$log->beban = $in['beban'];
		$log->arus_r = $in['arus_r'];
		$log->arus_s = $in['arus_s'];
		$log->arus_t = $in['arus_t'];
		$log->penguat = $in['penguat'];
		$log->winding_1 = $in['winding_1'];
		$log->winding_2 = $in['winding_2'];
		$log->winding_3 = $in['winding_3'];
		$log->bearing = $in['bearing'];
		$log->kwh_produksi_hsd = $in['kwh_produksi_hsd'];
		$log->kwh_produksi_mfo = $in['kwh_produksi_mfo'];
		$log->kwh_alat_bantu = $in['kwh_alat_bantu'];
		$log->level_becoms = $in['level_becoms'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
		$log->users_id = $in['users_id'];
        $log->save();
        return 'success';
    }
}
