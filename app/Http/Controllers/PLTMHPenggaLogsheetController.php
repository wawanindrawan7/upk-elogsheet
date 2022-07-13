<?php

namespace App\Http\Controllers;

use App\Models\PLTMHPenggaLogsheet;
use Illuminate\Http\Request;

class PLTMHPenggaLogsheetController extends Controller
{
    public function view(Request $r)
    {
        return view('pltmh-pengga.log');
    }

    public function loadData(Request $r)
    {
        $log = PLTMHPenggaLogsheet::all();
        return compact('log');
    }

    public function create(Request $in)
    {
        $log = new PLTMHPenggaLogsheet();
        $log->jam = $in['jam'];
        $log->tanggal = date("Y-m-d");
        $log->real_time = date("Y-m-d H:i:s");
        $log->tek_air_turbin = $in['tek_air_turbin'];
        $log->gen_speed = $in['gen_speed'];
        $log->vol_gen_rs = $in['vol_gen_rs'];
        $log->vol_gen_st = $in['vol_gen_st'];
        $log->vol_gen_tr = $in['vol_gen_tr'];
        $log->arus_gen_r = $in['arus_gen_r'];
        $log->arus_gen_s = $in['arus_gen_s'];
        $log->arus_gen_t = $in['arus_gen_t'];
        $log->beban = $in['beban'];
        $log->cos_q = $in['cos_q'];
        $log->freq = $in['freq'];
        $log->excit_teg = $in['excit_teg'];
        $log->excit_arus = $in['excit_arus'];
        $log->kwh_prod_exp = $in['kwh_prod_exp'];
        $log->kwh_prod_imp = $in['kwh_prod_imp'];
        $log->temp_bearing_1 = $in['temp_bearing_1'];
        $log->temp_bearing_2 = $in['temp_bearing_2'];
        $log->temp_gear_box = $in['temp_gear_box'];
        $log->temp_wind_gen = $in['temp_wind_gen'];
        $log->level_air = $in['level_air'];
        $log->debit = $in['debit'];
        $log->kwh_ps = $in['kwh_ps'];
        $log->kwh_eb = $in['kwh_eb'];
        $log->ket = $in['ket'];
        // $log->pltmh_pengga_pl_id = $in['pl_id'];
        $log->save();
        return 'success';
    }
}
