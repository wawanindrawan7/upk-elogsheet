<?php

namespace App\Http\Controllers;

use App\Models\PLTDOgfSgLog;
use App\Models\PLTDUnit;
use Illuminate\Http\Request;

class PLTDOgfSgLogController extends Controller
{
    public function view(Request $r){
		$unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.ogf-sg-log', compact('unit'));
    }

	public function detail(Request $r){
		$log = PLTDOgfSgLog::with('users')->with('pltdUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
		if($r->date == null){
			$log = PLTDOgfSgLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->get();
		}else{
			$log = PLTDOgfSgLog::with('users')->where('tanggal', $r->date)->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->get();
		}
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDOgfSgLog();
		$log->jam = $in['jam'];
		$log->users_id = $in['users_id'];
		$log->real_time = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
        $log->pltd_unit_id = $in['pltd_unit_id'];
		$log->panaraga_analog = $in['panaraga_analog'];
		$log->panaraga_digital = $in['panaraga_digital'];
		$log->ps9_analog = $in['ps9_analog'];
		$log->ps9_digital = $in['ps9_digital'];
		$log->praya_analog = $in['praya_analog'];
		$log->praya_digital = $in['praya_digital'];
		$log->seng_analog = $in['seng_analog'];
		$log->seng_digital = $in['seng_digital'];
		$log->kopang_analog = $in['kopang_analog'];
		$log->kopang_digital = $in['kopang_digital'];
		$log->gomong_analog = $in['gomong_analog'];
		$log->gomong_digital = $in['gomong_digital'];
		$log->kediri_analog = $in['kediri_analog'];
		$log->kediri_digital = $in['kediri_digital'];
		$log->taman_a_analog_imp = $in['taman_a_analog_imp'];
		$log->taman_a_analog_exp = $in['taman_a_analog_exp'];
		$log->taman_a_digital_imp = $in['taman_a_digital_imp'];
		$log->taman_a_digital_exp = $in['taman_a_digital_exp'];
		$log->biau_analog_imp = $in['biau_analog_imp'];
		$log->biau_analog_exp = $in['biau_analog_exp'];
		$log->biau_digital_imp = $in['biau_digital_imp'];
		$log->biau_digital_exp = $in['biau_digital_exp'];
		$log->sewa1_imp = $in['sewa1_imp'];
		$log->sewa1_exp = $in['sewa1_exp'];
		$log->sewa2_imp = $in['sewa2_imp'];
		$log->sewa2_exp = $in['sewa2_exp'];
		$log->gi1_imp = $in['gi1_imp'];
		$log->gi1_exp = $in['gi1_exp'];
		$log->gi2_imp = $in['gi2_imp'];
		$log->gi2_exp = $in['gi2_exp'];
		$log->inc1_imp = $in['inc1_imp'];
		$log->inc1_exp = $in['inc1_exp'];
		$log->inc1_kw = $in['inc1_kw'];
		$log->inc2_imp = $in['inc2_imp'];
		$log->inc2_exp = $in['inc2_exp'];
		$log->inc2_kw = $in['inc2_kw'];
		$log->inc3_imp = $in['inc3_imp'];
		$log->inc3_exp = $in['inc3_exp'];
		$log->inc3_kw = $in['inc3_kw'];
		$log->inc4_imp = $in['inc4_imp'];
		$log->inc4_exp = $in['inc4_exp'];
		$log->inc4_kw = $in['inc4_kw'];
		$log->inc5_imp = $in['inc5_imp'];
		$log->inc5_exp = $in['inc5_exp'];
		$log->inc5_kw = $in['inc5_kw'];
		$log->inc6_imp = $in['inc6_imp'];
		$log->inc6_exp = $in['inc6_exp'];
		$log->inc6_kw = $in['inc6_kw'];
		$log->out1_imp = $in['out1_imp'];
		$log->out1_exp = $in['out1_exp'];
		$log->out1_kw = $in['out1_kw'];
		$log->out2_imp = $in['out2_imp'];
		$log->out2_exp = $in['out2_exp'];
		$log->out2_kw = $in['out2_kw'];
		$log->out3_imp = $in['out3_imp'];
		$log->out3_exp = $in['out3_exp'];
		$log->out3_kw = $in['out3_kw'];
        $log->save();
        return 'success';
    }

}
