<?php

namespace App\Http\Controllers;

use App\Models\PLTDPMOgfLog;
use App\Models\PLTDPMUnit;
use App\Models\PLTDPMZVEngLog;
use App\Models\PLTDPMZVGenLog;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PLTDPMController extends Controller
{
    public function index()
    {
        return view('pltd-pm.pm-home');
    }

    public function zvExport(Request $r){
        // return $r->all();

        $reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('pltd-paok-motong/zv-gen-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDPMUnit::find($r->unit_id);
        // return $unit;
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $eng_logs = PLTDPMZVEngLog::where('tanggal', $r->date)->where('pltd_pm_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
        foreach ($eng_logs as $l) {
            array_push($data, array(
				$l->jam,
				$l->udmas_sisi_a,
				$l->udmas_sisi_b,
				$l->oli_masmes_a,
				$l->oli_masmes_b,
				$l->oli_rad_mas,
				$l->oli_rad_kel,
				$l->air_pen_masmes_a,
				$l->air_pen_masmes_b,
				$l->air_pen_rad_mas,
				$l->air_pen_rad_kel,
				$l->air_pen_inj_mas,
				$l->air_pen_inj_kel,
				$l->air_pen_kel_silsis_1a,
				$l->air_pen_kel_silsis_2a,
				$l->air_pen_kel_silsis_3a,
				$l->air_pen_kel_silsis_4a,
				$l->air_pen_kel_silsis_5a,
				$l->air_pen_kel_silsis_6a,
				$l->gas_buang_kel_silsis_1a,
				$l->gas_buang_kel_silsis_2a,
				$l->gas_buang_kel_silsis_3a,
				$l->gas_buang_kel_silsis_4a,
				$l->gas_buang_kel_silsis_5a,
				$l->gas_buang_kel_silsis_6a,
				$l->gas_buang_kel_silsis_1b,
				$l->gas_buang_kel_silsis_2b,
				$l->gas_buang_kel_silsis_3b,
				$l->gas_buang_kel_silsis_4b,
				$l->gas_buang_kel_silsis_5b,
				$l->gas_buang_kel_silsis_6b,
				$l->main_bearing_1,
				$l->main_bearing_2,
				$l->main_bearing_3,
				$l->main_bearing_4,
				$l->main_bearing_5,
				$l->main_bearing_6,
				$l->main_bearing_7,
				$l->main_bearing_8,
				$l->main_bearing_9,
				$l->turbo_mas_a_mas,
				$l->turbo_mas_a_kel,
				$l->turbo_mas_b_mas,
				$l->turbo_mas_b_kel,
				$l->turbo_kel_a,
				$l->turbo_kel_b,
				$l->temp_air_pen_kel_mes,
				$l->temp_bah_bak_mas_mes,
				$l->rack_bahan_bakar,
				$l->gov_load_limit,
				$l->tek_udara_start,
				$l->tek_udara_masuk_a_b,
				$l->tek_bah_bak_mas_mes,
				$l->tek_minyak_pelumas,
				$l->tek_air_pen_mes,
				$l->tek_air_pen_inj,
				$l->tek_ud_mas_dis_sisi_a,
				$l->tek_ud_mas_dis_sisi_b,
				$l->put_turbo_sisi_a,
				$l->put_turbo_sisi_b,
				$l->tek_oli_separator,
				$l->ampere_pompa_ali,
				$l->ampere_pompa_jw,
				$l->sikap_flow_meter_bahan_bakar_in,
				$l->sikap_flow_meter_bahan_bakar_return,
				$l->time_check,
				'',
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A15', false, false);

        $excel->setActiveSheetIndex(1);
        // where('tanggal', $r->date)->
        $gen_logs = PLTDPMZVGenLog::where('tanggal', $r->date)->where('pltd_pm_unit_id',$unit->id)->orderBy('jam','asc')->get();
        $data = [];
        foreach ($gen_logs as $l) {
            array_push($data, array(
				$l->jam,
				$l->teg,
				$l->freq,
				$l->faktor_daya,
				$l->daya_semu,
				$l->beban,
				$l->arus_r,
				$l->arus_s,
				$l->arus_t,
				$l->penguat,
				$l->winding_1,
				$l->winding_2,
				$l->winding_3,
				$l->bearing,
				$l->kwh_produksi_total,
				$l->kwh_alat_bantu,
				$l->level_becoms,
				$l->time_check,
				''
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A20', false, false);

        //EXPORT
        $filename = 'Logs - ' . $r->date;
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');

    }


    public function ogfExport(Request $r)
    {
        $reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('pltd-paok-motong/ogf-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDPMUnit::find($r->unit_id);
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $ogf_cr = PLTDPMOgfLog::where('tanggal', $r->date)->where('pltd_pm_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
        foreach ($ogf_cr as $log) {
            array_push($data, array(
				$log->jam,
				$log->sikur_r ,
				$log->sikur_s ,
				$log->sikur_t ,
				$log->sikur_mw ,
				$log->sikur_exp ,
				$log->sikur_imp ,
				$log->masbagik_r ,
				$log->masbagik_s ,
				$log->masbagik_t ,
				$log->masbagik_mw ,
				$log->masbagik_exp ,
				$log->masbagik_imp ,
				$log->sakra_r ,
				$log->sakra_s ,
				$log->sakra_t ,
				$log->sakra_mw ,
				$log->sakra_exp ,
				$log->sakra_imp ,
				$log->keruak_r ,
				$log->keruak_s ,
				$log->keruak_t ,
				$log->keruak_mw ,
				$log->keruak_exp ,
				$log->keruak_imp ,
				$log->pancor_r ,
				$log->pancor_s ,
				$log->pancor_t ,
				$log->pancor_mw ,
				$log->pancor_exp ,
				$log->pancor_imp ,
				$log->rempung_r ,
				$log->rempung_s ,
				$log->rempung_t ,
				$log->rempung_mw ,
				$log->rempung_exp ,
				$log->rempung_imp ,
				$log->amp_r ,
				$log->amp_s ,
				$log->amp_t ,
				$log->amp_mw ,
				$log->amp_exp ,
				$log->amp_imp ,
				$log->gi_pri_r ,
				$log->gi_pri_s ,
				$log->gi_pri_t ,
				$log->gi_pri_mw ,
				$log->gi_pri_exp ,
				$log->gi_pri_imp ,
				$log->gi_paok_r  ,
				$log->gi_paok_s  ,
				$log->gi_paok_t  ,
				$log->gi_paok_mw ,
				$log->gi_paok_exp ,
				$log->gi_paok_imp ,
				$log->ip1_r ,
				$log->ip1_s ,
				$log->ip1_t ,
				$log->ip1_mw ,
				$log->ip1_exp ,
				$log->ip1_imp ,
				$log->ip2_r ,
				$log->ip2_s ,
				$log->ip2_t ,
				$log->ip2_mw ,
				$log->ip2_exp ,
				$log->ip2_imp ,
				$log->set_r ,
				$log->set_s ,
				$log->set_t ,
				$log->set_mw ,
				$log->set_exp ,
				$log->set_imp ,
				$log->time_check,
				'',
				));
		  }
        $excel->getActiveSheet()->fromArray($data, null, 'A22', false, false);

            $filename = 'OGF Logs - ' . $r->date;
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
    }

}
