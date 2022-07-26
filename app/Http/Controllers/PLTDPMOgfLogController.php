<?php

namespace App\Http\Controllers;

use App\Models\PLTDPMOgfLog;
use App\Models\PLTDPMUnit;
use Illuminate\Http\Request;

class PLTDPMOgfLogController extends Controller
{
    public function view(Request $r){
        $unit = PLTDPMUnit::find($r->unit_id);
        return view('pltd-pm.ogf-log', compact('unit'));
    }

	public function detail(Request $r){
		$log = PLTDPMOgfLog::with('users')->with('pltdPmUnit')->find($r->id);
		return $log;
	}

	public function loadData(Request $r){
		if($r->date == null){
			$log = PLTDPMOgfLog::with('users')->with('pltdPmUnit')->where('pltd_pm_unit_id', $r->unit_id)->get();
		}else{
			$log = PLTDPMOgfLog::with('users')->with('pltdPmUnit')->where('tanggal', $r->date)->where('pltd_pm_unit_id', $r->unit_id)->get();
		}
		return compact('log');
	}

    public function create(Request $in){
        $log = new PLTDPMOgfLog();
		$log->jam = $in['jam'];
		$log->time_check = date("Y-m-d H:i:s");
		$log->tanggal = date("Y-m-d");
		$log->sikur_r = $in['sikur_r'];
		$log->sikur_s = $in['sikur_s'];
		$log->sikur_t = $in['sikur_t'];
		$log->sikur_mw = $in['sikur_mw'];
		$log->sikur_exp = $in['sikur_exp'];
		$log->sikur_imp = $in['sikur_imp'];
		$log->masbagik_r = $in['masbagik_r'];
		$log->masbagik_s = $in['masbagik_s'];
		$log->masbagik_t = $in['masbagik_t'];
		$log->masbagik_mw = $in['masbagik_mw'];
		$log->masbagik_exp = $in['masbagik_exp'];
		$log->masbagik_imp = $in['masbagik_imp'];
		$log->sakra_r = $in['sakra_r'];
		$log->sakra_s = $in['sakra_s'];
		$log->sakra_t = $in['sakra_t'];
		$log->sakra_mw = $in['sakra_mw'];
		$log->sakra_exp = $in['sakra_exp'];
		$log->sakra_imp = $in['sakra_imp'];
		$log->keruak_r = $in['keruak_r'];
		$log->keruak_s = $in['keruak_s'];
		$log->keruak_t = $in['keruak_t'];
		$log->keruak_mw = $in['keruak_mw'];
		$log->keruak_exp = $in['keruak_exp'];
		$log->keruak_imp = $in['keruak_imp'];
		$log->pancor_r = $in['pancor_r'];
		$log->pancor_s = $in['pancor_s'];
		$log->pancor_t = $in['pancor_t'];
		$log->pancor_mw = $in['pancor_mw'];
		$log->pancor_exp = $in['pancor_exp'];
		$log->pancor_imp = $in['pancor_imp'];
		$log->rempung_r = $in['rempung_r'];
		$log->rempung_s = $in['rempung_s'];
		$log->rempung_t = $in['rempung_t'];
		$log->rempung_mw = $in['rempung_mw'];
		$log->rempung_exp = $in['rempung_exp'];
		$log->rempung_imp = $in['rempung_imp'];
		$log->amp_r = $in['amp_r'];
		$log->amp_s = $in['amp_s'];
		$log->amp_t = $in['amp_t'];
		$log->amp_mw = $in['amp_mw'];
		$log->amp_exp = $in['amp_exp'];
		$log->amp_imp = $in['amp_imp'];
		$log->gi_pri_r = $in['gi_pri_r'];
		$log->gi_pri_s = $in['gi_pri_s'];
		$log->gi_pri_t = $in['gi_pri_t'];
		$log->gi_pri_mw = $in['gi_pri_mw'];
		$log->gi_pri_exp = $in['gi_pri_exp'];
		$log->gi_pri_imp = $in['gi_pri_imp'];
		$log->gi_paok_r = $in['gi_paok_r'];
		$log->gi_paok_s = $in['gi_paok_s'];
		$log->gi_paok_t = $in['gi_paok_t'];
		$log->gi_paok_mw = $in['gi_paok_mw'];
		$log->gi_paok_exp = $in['gi_paok_exp'];
		$log->gi_paok_imp = $in['gi_paok_imp'];
		$log->ip1_r = $in['ip1_r'];
		$log->ip1_s = $in['ip1_s'];
		$log->ip1_t = $in['ip1_t'];
		$log->ip1_mw = $in['ip1_mw'];
		$log->ip1_exp = $in['ip1_exp'];
		$log->ip1_imp = $in['ip1_imp'];
		$log->ip2_r = $in['ip2_r'];
		$log->ip2_s = $in['ip2_s'];
		$log->ip2_t = $in['ip2_t'];
		$log->ip2_mw = $in['ip2_mw'];
		$log->ip2_exp = $in['ip2_exp'];
		$log->ip2_imp = $in['ip2_imp'];
		$log->set_r = $in['set_r'];
		$log->set_s = $in['set_s'];
		$log->set_t = $in['set_t'];
		$log->set_mw = $in['set_mw'];
		$log->set_exp = $in['set_exp'];
		$log->set_imp = $in['set_imp'];
		$log->pltd_pm_unit_id = $in['pltd_pm_unit_id'];
		$log->users_id = $in['users_id'];
        $log->save();
        return 'success';
    }
}
