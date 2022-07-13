<?php

namespace App\Http\Controllers;

use App\Models\PLTSLogsheet;
use Illuminate\Http\Request;

class PLTSLogsheetController extends Controller
{
    public function view(Request $r)
    {
        return view('plts.log');
    }

    public function loadData(Request $r)
    {
        $log = PLTSLogsheet::all();
        return compact('log');
    }

    // function create
    public function create(Request $in)
    {
        // return $in->all();
        $log = new PLTSLogsheet;
        $log->jam = $in['jam'];
        $log->tanggal = date("Y-m-d");
        $log->real_time = date("Y-m-d H:i:s");
        $log->pv_modul_volt = $in['pv_modul_volt'];
        $log->pv_modul_curr = $in['pv_modul_curr'];
        $log->pv_modul_power = $in['pv_modul_power'];
        $log->pv_modul_today = $in['pv_modul_today'];
        $log->pv_modul_acc = $in['pv_modul_acc'];
        $log->irradians = $in['irradians'];
        $log->irradiations = $in['irradiations'];
        $log->grid_volt_r = $in['grid_volt_r'];
        $log->grid_volt_s = $in['grid_volt_s'];
        $log->grid_volt_t = $in['grid_volt_t'];
        $log->grid_curr_r = $in['grid_curr_r'];
        $log->grid_curr_s = $in['grid_curr_s'];
        $log->grid_curr_t = $in['grid_curr_t'];
        $log->grid_power_r = $in['grid_power_r'];
        $log->grid_power_s = $in['grid_power_s'];
        $log->grid_power_t = $in['grid_power_t'];
        $log->freq = $in['freq'];
        $log->gen_power = $in['gen_power'];
        $log->energy_today = $in['energy_today'];
        $log->energy_acc = $in['energy_acc'];
        $log->energy_eb = $in['energy_eb'];
        $log->ket = $in['ket'];
        $log->temp_pv = $in['temp_pv'];
        $log->temp_ambien = $in['temp_ambien'];
        $log->kwh_ps = $in['kwh_ps'];
        $log->plts_inverter_id = $in['inv_id'];
        // $log->plts_pl_id = $in['pl_id'];
        $log->save();
        return 'success';
    }
}
