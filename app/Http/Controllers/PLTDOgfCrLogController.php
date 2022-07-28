<?php

namespace App\Http\Controllers;

use App\Models\PLTDOgfCrLog;
use App\Models\PLTDUnit;
use Illuminate\Http\Request;

class PLTDOgfCrLogController extends Controller
{
    public function view(Request $r){
		$unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.ogf-cr-log', compact('unit'));
    }

	public function detail(Request $r){
		$log = PLTDOgfCrLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
		$date = $r->has('date') ? $r->date : date('Y-m-d');
		$log = PLTDOgfCrLog::with('users')->where('tanggal', $date)->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->get();
		
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDOgfCrLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
        $log->pltd_unit_id = $in['pltd_unit_id'];
		$log->gi_r = $in['gi_r'];
		$log->gi_s = $in['gi_s'];
		$log->gi_t = $in['gi_t'];
		$log->gi_kw = $in['gi_kw'];
		$log->sewa1_r = $in['sewa1_r'];
		$log->sewa1_s = $in['sewa1_s'];
		$log->sewa1_t = $in['sewa1_t'];
		$log->sewa1_kw = $in['sewa1_kw'];
		$log->sewa2_r = $in['sewa2_r'];
		$log->sewa2_s = $in['sewa2_s'];
		$log->sewa2_t = $in['sewa2_t'];
		$log->sewa2_kw = $in['sewa2_kw'];
		$log->panaraga_r = $in['panaraga_r'];
		$log->panaraga_s = $in['panaraga_s'];
		$log->panaraga_t = $in['panaraga_t'];
		$log->panaraga_kw = $in['panaraga_kw'];
		$log->praya_r = $in['praya_r'];
		$log->praya_s = $in['praya_s'];
		$log->praya_t = $in['praya_t'];
		$log->praya_kw = $in['praya_kw'];
		$log->taman_r = $in['taman_r'];
		$log->taman_s = $in['taman_s'];
		$log->taman_t = $in['taman_t'];
		$log->taman_kw = $in['taman_kw'];
		$log->seng_r = $in['seng_r'];
		$log->seng_s = $in['seng_s'];
		$log->seng_t = $in['seng_t'];
		$log->seng_kw = $in['seng_kw'];
		$log->kopang_r = $in['kopang_r'];
		$log->kopang_s = $in['kopang_s'];
		$log->kopang_t = $in['kopang_t'];
		$log->kopang_kw = $in['kopang_kw'];
		$log->gomong_r = $in['gomong_r'];
		$log->gomong_s = $in['gomong_s'];
		$log->gomong_t = $in['gomong_t'];
		$log->gomong_kw = $in['gomong_kw'];
		$log->kediri_r = $in['kediri_r'];
		$log->kediri_s = $in['kediri_s'];
		$log->kediri_t = $in['kediri_t'];
		$log->kediri_kw = $in['kediri_kw'];
		$log->gi2_r = $in['gi2_r'];
		$log->gi2_s = $in['gi2_s'];
		$log->gi2_t = $in['gi2_t'];
		$log->gi2_kw = $in['gi2_kw'];
		$log->biau_r = $in['biau_r'];
		$log->biau_s = $in['biau_s'];
		$log->biau_t = $in['biau_t'];
		$log->biau_kw = $in['biau_kw'];
        $log->save();
        return 'success';
    }
}
