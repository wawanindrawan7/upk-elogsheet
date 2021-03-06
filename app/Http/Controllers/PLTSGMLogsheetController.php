<?php

namespace App\Http\Controllers;

use App\Models\PLTSGMLogsheet;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PLTSGMLogsheetController extends Controller
{
    public function view(Request $r)
    {
        $inverter_id = $r->inverter_id;
        return view('plts-gm.log', compact('inverter_id'));
    }

    public function home(){
        return view('plts-gm.plts-gm-home');
    }

    public function loadData(Request $r)
    {
        if($r->date == null){
			$log = PLTSGMLogsheet::with('users')->with('pltsGmInverter')->where('plts_gm_inverter_id', $r->inverter_id)->get();
		}else{
			$log = PLTSGMLogsheet::with('users')->with('pltsGmInverter')->where('tanggal', $r->date)->where('plts_gm_inverter_id', $r->inverter_id)->get();
		}
		return compact('log');
    }

    public function create(Request $in)
    {
        $log = new PLTSGMLogsheet();
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
        $log->temp_pv = $in['temp_pv'];
        $log->temp_ambien = $in['temp_ambien'];
        $log->kwh_ps = $in['kwh_ps'];
        $log->ket = $in['ket'];
        $log->plts_gm_inverter_id = $in['plts_gm_inverter_id'];
        $log->save();
        return 'success';
    }

    public function export(Request $r){
        {
            $reader = IOFactory::createReader('Xlsx');
            //load file template
            $excel = $reader->load('plts-gm.xlsx');
            //sheet yg di tuju
            $unit = PLTSGMLogsheet::find($r->unit_id);
            // Unit1LogBoilerFans
            $excel->setActiveSheetIndex(0);
            // where('tanggal', $r->date)->
            $log = PLTSGMLogsheet::where('tanggal', $r->date)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, [
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket]);
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

                $filename = 'PLTS Gili Meno Logs - ' . $r->date;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
                $writer = IOFactory::createWriter($excel, 'Xlsx');
                $writer->save('php://output');
        }
    }

    public function exportAll(Request $r){
        {
            $reader = IOFactory::createReader('Xlsx');
            //load file template
            $excel = $reader->load('plts-gm-all.xlsx');
            //sheet yg di tuju
            $unit = PLTSGMLogsheet::find($r->unit_id);
            // Unit1LogBoilerFans
            $excel->setActiveSheetIndex(0);
            // where('tanggal', $r->date)->
            $log = PLTSGMLogsheet::where('tanggal', $r->date)->where('plts_gm_inverter_id', 1)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, [
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket]);
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

            $excel->setActiveSheetIndex(1);
            // where('tanggal', $r->date)->
            $log = PLTSGMLogsheet::where('tanggal', $r->date)->where('plts_gm_inverter_id', 2)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, [
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket]);
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

                $filename = 'PLTS Gili Meno Logs - ' . $r->date;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
                $writer = IOFactory::createWriter($excel, 'Xlsx');
                $writer->save('php://output');
        }
    }
}
