<?php

namespace App\Http\Controllers;

use App\Models\PLTMHPenggaLogsheet;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    public function export(Request $r){
        {
            $reader = IOFactory::createReader('Xlsx');
            //load file template
            $excel = $reader->load('pengga.xlsx');
            //sheet yg di tuju
            $unit = PLTMHPenggaLogsheet::find($r->unit_id);
            // Unit1LogBoilerFans
            $excel->setActiveSheetIndex(0);
            // where('tanggal', $r->date)->
            $log = PLTMHPenggaLogsheet::where('tanggal', $r->date)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, [
                    $log[$i]['jam'], $log[$i]['tek_air_turbin'], $log[$i]['gen_speed']
                    , $log[$i]['vol_gen_rs'], $log[$i]['vol_gen_st'], $log[$i]['vol_gen_tr'], $log[$i]['arus_gen_r']
                    , $log[$i]['arus_gen_s'], $log[$i]['arus_gen_t'], $log[$i]['beban'], $log[$i]['cos_q'],
                    $log[$i]['freq'], $log[$i]['excit_teg'], $log[$i]['excit_arus'], $log[$i]['kwh_prod_exp'],
                    $log[$i]['kwh_prod_imp'], $log[$i]['temp_bearing_1'], $log[$i]['temp_bearing_2'],
                    $log[$i]['temp_gear_box'], $log[$i]['temp_wind_gen'], $log[$i]['level_air'], $log[$i]['debit'],
                    $log[$i]['kwh_ps'], $log[$i]['real_time'], '', $log[$i]->ket]);
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A15', false, false);

                $filename = 'PLTMH Pengga Logs - ' . $r->date;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
                $writer = IOFactory::createWriter($excel, 'Xlsx');
                $writer->save('php://output');
        }
    }
}
