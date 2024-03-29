<?php

namespace App\Http\Controllers;

use App\Models\PLTSGAInverter;
use App\Models\PLTSGALogsheet;
use App\Models\PLTSGiliAirResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PLTSGALogsheetController extends Controller
{
    //
    public function view(Request $r)
    {
        // $inverter_id = $r->inverter_id;
        $date = $r->has('date') ? $r->date : date('Y-m-d');
        $inverter = PLTSGAInverter::find($r->inverter_id);
        return view('plts-ga.log', compact('inverter','date'));
    }

    public function home(){
        return view('plts-ga.plts-ga-home');
    }

    public function loadData(Request $r)
    {
        if($r->date != date('Y-m-d')){
			$log = PLTSGALogsheet::with('users')->with('pltsGiliAirInverter')->where('plts_gili_air_inverter_id', $r->inverter_id)->where('tanggal', $r->date)->orderBy('tanggal','desc')->orderBy('jam','desc')->get();
		}else{
			$log = PLTSGALogsheet::with('users')->with('pltsGiliAirInverter')->where('plts_gili_air_inverter_id', $r->inverter_id)->orderBy('tanggal','desc')->orderBy('jam','desc')->take(24)->get();
		}
		return compact('log');
    }

    public function detail(Request $r){
		$log = PLTSGALogsheet::with('users')->with('pltsGiliAirInverter')->find($r->id);
		return $log;
	}

    public function create(Request $in)
    {
        DB::beginTransaction();
        try {
            $lb = PLTSGALogsheet::where('tanggal', date('Y-m-d'))->orderBy('id','desc')->where('plts_gili_air_inverter_id', $in->plts_gili_air_inverter_id)->first();

            $log = new PLTSGALogsheet();
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
            $log->plts_gili_air_inverter_id = $in['plts_gili_air_inverter_id'];
            $log->users_id = $in['users_id'];
            $log->save();

            $resume = new PLTSGiliAirResume();
            $resume->plts_gili_air_logsheet_id = $log->id;
            $resume->plts_gili_air_inverter_id = $log->plts_gili_air_inverter_id;
            $resume->tanggal = $log->tanggal;
            $resume->jam = $log->jam;
            $resume->energy_today = ($lb != null) ? ($log->energy_today - $lb->energy_today) : $log->energy_today;
            $resume->kwh_ps = ($lb != null) ? ($log->kwh_ps - $lb->kwh_ps) : $log->kwh_ps;
            $resume->save();

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
            $log = PLTSGALogsheet::find($in->id);
            $log->jam = $in['jam'];
            $log->tanggal = $in->tanggal;
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
            $log->save();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $th->getMessage();
        }
    
    }

    public function export(Request $r){
        {
            $reader = IOFactory::createReader('Xlsx');
            //load file template
            $excel = $reader->load('plts-ga.xlsx');
            //sheet yg di tuju
            $unit = PLTSGALogsheet::find($r->unit_id);
            // Unit1LogBoilerFans
            $excel->setActiveSheetIndex(0);
            // where('tanggal', $r->date)->
            $log = PLTSGALogsheet::where('tanggal', $r->date)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, array(
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket,
                    )
                );
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

                $filename = 'PLTS Gili Air Logs - ' . $r->date;
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
            $excel = $reader->load('plts-ga-all.xlsx');
            //sheet yg di tuju
            $unit = PLTSGALogsheet::find($r->unit_id);
            // Unit1LogBoilerFans
            $excel->setActiveSheetIndex(0);
            // where('tanggal', $r->date)->
            $log = PLTSGALogsheet::where('tanggal', $r->date)->where('plts_gili_air_inverter_id', 1)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, array(
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket,
                    )
                );
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

            $excel->setActiveSheetIndex(1);
            // where('tanggal', $r->date)->
            $log = PLTSGALogsheet::where('tanggal', $r->date)->where('plts_gili_air_inverter_id', 2)->orderBy('jam','asc')->get();
            // return $eng_logs;
            $data = [];
            for ($i = 0; $i < count($log); $i++) {
                array_push($data, array(
                    $log[$i]['jam'], $log[$i]['pv_modul_volt'], $log[$i]['pv_modul_curr'],
                    $log[$i]['pv_modul_power'], $log[$i]['pv_modul_today'], $log[$i]['pv_modul_acc'],
                    $log[$i]['irradians'], $log[$i]['irradiations'], $log[$i]['grid_volt_r'],
                    $log[$i]['grid_volt_s'], $log[$i]['grid_volt_t'], $log[$i]['grid_curr_r'],
                    $log[$i]['grid_curr_s'], $log[$i]['grid_curr_t'], $log[$i]['grid_power_r'],
                    $log[$i]['grid_power_s'], $log[$i]['grid_power_t'], $log[$i]['freq'],
                    $log[$i]['gen_power'], $log[$i]['energy_today'], $log[$i]['energy_acc'],
                    $log[$i]['energy_eb'], $log[$i]['temp_pv'], $log[$i]['temp_ambien'], $log[$i]['kwh_ps'],
                    $log[$i]['real_time'], '', $log[$i]->ket,
                    )
                );
            }
            $excel->getActiveSheet()->fromArray($data, null, 'A11', false, false);

                $filename = 'PLTS Gili Air Logs - ' . $r->date;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
                $writer = IOFactory::createWriter($excel, 'Xlsx');
                $writer->save('php://output');
        }
    }
}
