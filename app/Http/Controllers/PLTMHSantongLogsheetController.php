<?php

namespace App\Http\Controllers;

use App\Models\PLTMHSantongLogsheet;
use Illuminate\Http\Request;

class PLTMHSantongLogsheetController extends Controller
{
    public function view(Request $r)
    {
        return view('pltmh-santong.log');
    }

    public function loadData(Request $r)
    {
        $log = PLTMHSantongLogsheet::all();
        return compact('log');
    }

    public function create(Request $in)
    {
        $log = new PLTMHSantongLogsheet();
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
        $log->kwh_line_exp = $in['kwh_line_exp'];
        $log->kwh_line_imp = $in['kwh_line_imp'];
        $log->kwh_prod_exp = $in['kwh_prod_exp'];
        $log->kwh_prod_imp = $in['kwh_prod_imp'];
        $log->temp_bearing_1 = $in['temp_bearing_1'];
        $log->temp_bearing_2 = $in['temp_bearing_2'];
        $log->temp_bearing_3 = $in['temp_bearing_3'];
        $log->temp_winding_1 = $in['temp_winding_1'];
        $log->temp_winding_2 = $in['temp_winding_2'];
        $log->temp_winding_3 = $in['temp_winding_3'];
        $log->temp_winding_4 = $in['temp_winding_4'];
        $log->temp_winding_5 = $in['temp_winding_5'];
        $log->temp_winding_6 = $in['temp_winding_6'];
        $log->level_air = $in['level_air'];
        $log->debit = $in['debit'];
        $log->kwh_ps = $in['kwh_ps'];
        $log->ket = $in['ket'];
        // $log->pltmh_santong_pl_id = $in['pl_id'];
        $log->save();
        return 'success';
    }
}
