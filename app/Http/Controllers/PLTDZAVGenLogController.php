<?php

namespace App\Http\Controllers;

use App\Models\PLTDUnit;
use App\Models\PLTDZAVGenLog;
use App\Models\PLTDZAVResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLTDZAVGenLogController extends Controller
{
    public function view(Request $r)
    {
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $unit = PLTDUnit::find($r->unit_id);
        return view('pltd-amp.zav-gen-log', compact('unit', 'date'));
    }

    public function detail(Request $r)
    {
        $log = PLTDZAVGenLog::with('users')->with('pltdUnit')->find($r->id);
        return $log;
    }

    public function loadData(Request $r)
    {
        if ($r->date != date('Y-m-d')) {
            $log = PLTDZAVGenLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->where('tanggal', $r->date)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->get();
        } else {
            $log = PLTDZAVGenLog::with('users')->with('pltdUnit')->where('pltd_unit_id', $r->unit_id)->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->take(24)->get();
        }
        return compact('log');
    }

    public function create(Request $in)
    {
        DB::beginTransaction();
        try {
            $lb = PLTDZAVGenLog::orderBy('id', 'desc')->where('pltd_unit_id', $in->pltd_unit_id)->first();

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
            $cek = PLTDZAVResume::where('pltd_unit_id', $log->pltd_unit_id)->where('jam', $log->jam)->where('tanggal', $log->tanggal)->first();
            if ($cek == null) {
                $resume = new PLTDZAVResume();
                $resume->pltd_unit_id = $log->pltd_unit_id;
                $resume->jam = $log->jam;
                $resume->tanggal = $log->tanggal;
                $kwh_prod_hsd = ($lb != null) ? ($log->kwh_produksi_hsd - $lb->kwh_produksi_hsd) : $log->kwh_produksi_hsd;
                $kwh_prod_mfo = ($lb != null) ? ($log->kwh_produksi_mfo - $lb->kwh_produksi_mfo) : $log->kwh_produksi_mfo;

                $resume->kwh_prod_hsd = ($kwh_prod_hsd < 0) ? 0 : $kwh_prod_hsd;
                $resume->kwh_prod_mfo = ($kwh_prod_mfo < 0) ? 0 : $kwh_prod_mfo;

                $resume->kwh_prod = $resume->kwh_prod_hsd + $resume->kwh_prod_mfo;
                $resume->save();
            } else {
                $resume = PLTDZAVResume::find($cek->id);
                $kwh_prod_hsd = ($lb != null) ? ($log->kwh_produksi_hsd - $lb->kwh_produksi_hsd) : $log->kwh_produksi_hsd;
                $kwh_prod_mfo = ($lb != null) ? ($log->kwh_produksi_mfo - $lb->kwh_produksi_mfo) : $log->kwh_produksi_mfo;

                $resume->kwh_prod_hsd = ($kwh_prod_hsd < 0) ? 0 : $kwh_prod_hsd;
                $resume->kwh_prod_mfo = ($kwh_prod_mfo < 0) ? 0 : $kwh_prod_mfo;
                $resume->kwh_prod = $resume->kwh_prod_hsd + $resume->kwh_prod_mfo;
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
            

            $log = PLTDZAVGenLog::find($in->id);
            $log->jam = $in['jam'];
            // $log->users_id = $in['users_id'];
            // $log->pltd_unit_id = $in['pltd_unit_id'];
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
            $log->tanggal = $in['tanggal'];
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
