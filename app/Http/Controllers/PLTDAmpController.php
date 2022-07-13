<?php

namespace App\Http\Controllers;

use App\Models\PLTDNiigataEngLog;
use App\Models\PLTDNiigataGenLog;
use App\Models\PLTDOgfCrLog;
use App\Models\PLTDOgfSgLog;
use App\Models\PLTDUnit;
use App\Models\PLTDZAVCmrLog;
use App\Models\PLTDZAVEngLog;
use App\Models\PLTDZAVGenLog;
use App\Models\PLTDZVEngLog;
use App\Models\PLTDZVGenLog;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class PLTDAmpController extends Controller
{
    //
    public function index()
    {
        return view('pltd-amp.amp-home');
    }

    public function zvExport(Request $r){
        // return $r->all();

        $reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('zv-gen-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDUnit::find($r->unit_id);
        // return $unit;
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $eng_logs = PLTDZVEngLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
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
				$l->air_pen_kel_silsis_1b,
				$l->air_pen_kel_silsis_2b,
				$l->air_pen_kel_silsis_3b,
				$l->air_pen_kel_silsis_4b,
				$l->air_pen_kel_silsis_5b,
				$l->air_pen_kel_silsis_6b,
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
				$l->tek_pres_udmas_sisi_a,
				$l->tek_pres_udmas_sisi_b,
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
				$l->sikap_flow_meter_bahan_bakar_hsd,
				$l->time_check,
				$l->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A15', false, false);

        $excel->setActiveSheetIndex(1);
        // where('tanggal', $r->date)->
        $gen_logs = PLTDZVGenLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
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
				$l->kwh_produksi_hsd,
				$l->kwh_produksi_mfo,
				$l->kwh_alat_bantu,
				$l->level_becoms,
				$l->time_check,
				$l->users->name,
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

	public function zavExport(Request $r)
	{
		$reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('zav-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDUnit::find($r->unit_id);
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $eng_logs = PLTDZAVEngLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
		foreach ($eng_logs as $l) {
			array_push($data, array(
				$l->jam,
				$l->temp_ud_mas_dis_sis_a,
				$l->temp_ud_mas_dis_sis_b,
				$l->temp_minyak_pel_mas_mes_sis_a,
				$l->temp_minyak_pel_mas_mes_sis_b,
				$l->temp_minyak_pel_oil_cooler_masuk,
				$l->temp_minyak_pel_oil_cooler_keluar,
				$l->temp_minyak_pel_masuk_filter,
				$l->temp_raw_mater_inter_cooler_sisi_a_masuk,
				$l->temp_raw_mater_inter_cooler_sisi_a_keluar,
				$l->temp_raw_mater_inter_cooler_sisi_b_masuk,
				$l->temp_raw_mater_inter_cooler_sisi_b_keluar,
				$l->temp_raw_mater_oil_cooler_masuk,
				$l->temp_raw_mater_oil_cooler_keluar,
				$l->temp_raw_mater_rad_masuk,
				$l->temp_raw_mater_rad_keluar,
				$l->temp_air_pen_inj_masuk,
				$l->temp_air_pen_inj_keluar,
				$l->temp_bah_bak_mas_mes,
				$l->temp_bah_bak_mas_flow_meter,
				$l->temp_bah_bak_mas_pompa,
				$l->temp_air_pen_mes_mas_mes_sisi_a,
				$l->temp_air_pen_mes_mas_mes_sisi_b,
				$l->temp_air_pen_mes_mas_flow_inter_sisi_a,
				$l->temp_air_pen_mes_mas_flow_inter_sisi_b,
				$l->temp_air_pen_mes_rad_masuk,
				$l->temp_air_pen_mes_rad_keluar,
				$l->temp_air_pen_mes_kel_sil_a_1a,
				$l->temp_air_pen_mes_kel_sil_a_2a,
				$l->temp_air_pen_mes_kel_sil_a_3a,
				$l->temp_air_pen_mes_kel_sil_a_4a,
				$l->temp_air_pen_mes_kel_sil_a_5a,
				$l->temp_air_pen_mes_kel_sil_a_6a,
				$l->temp_air_pen_mes_kel_sil_b_1b,
				$l->temp_air_pen_mes_kel_sil_b_2b,
				$l->temp_air_pen_mes_kel_sil_b_3b,
				$l->temp_air_pen_mes_kel_sil_b_4b,
				$l->temp_air_pen_mes_kel_sil_b_5b,
				$l->temp_air_pen_mes_kel_sil_b_6b,
				$l->temp_air_pen_mes_keluar_mesin,
				$l->rack_bahan_bakar,
				$l->tek_udara_start,
				$l->tek_pres_udmas_sisi_a,
				$l->tek_pres_udmas_sisi_b,
				$l->tek_udara_masuk,
				$l->tek_bahan_bakar,
				$l->tek_minyak_pelumas,
				$l->tek_air_pen_mesin,
				$l->tek_air_pen_inj,
				$l->tek_raw_water_keluar_pompa,
				$l->tek_udara_masuk_dis_a,
				$l->tek_udara_masuk_dis_b,
				$l->tek_oli_separator,
				$l->level_tangki_bbm_har,
				$l->level_tangki_bbm_buffer,
				$l->level_oli_sump_tank,
				$l->sikap_flow_meter_bahan_bakar_in,
				$l->sikap_flow_meter_bahan_bakar_return,
				$l->sikap_flow_meter_bahan_bakar_hsd,
				$l->time_check,
				$l->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A19', false, false);

		$excel->setActiveSheetIndex(1);
        // where('tanggal', $r->date)->
        $gen_logs = PLTDZAVGenLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        $data = [];
		foreach ($gen_logs as $l) {
			array_push($data, array(
				$l->jam,
				$l->teg,
				$l->freq,
				$l->faktor_daya,
				$l->daya_semu,
				$l->beban,
				$l->arus_ka_r,
				$l->arus_ka_s,
				$l->arus_ka_t,
				$l->excit_arus,
				$l->excit_teg,
				$l->bearing,
				$l->kwh_produksi_hsd,
				$l->kwh_produksi_mfo,
				$l->kwh_alat_bantu,
				$l->arus_a_r,
				$l->arus_a_s,
				$l->arus_a_t,
				$l->level_becoms,
				$l->time_check,
				$l->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A18', false, false);


		$excel->setActiveSheetIndex(2);
        // where('tanggal', $r->date)->
        $cmr_logs = PLTDZAVCmrLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        $data = [];
		foreach ($cmr_logs as $l) {
			array_push($data, array(
				$l->jam,
				$l->udara_start,
				$l->air_pen_mesin,
				$l->air_pen_injektor,
				$l->raw_water,
				$l->minyak_pelumas,
				$l->bahan_bakar,
				$l->udara_masuk,
				$l->temp_gas_buang_kel_sil_sisi_a_1,
				$l->temp_gas_buang_kel_sil_sisi_a_2,
				$l->temp_gas_buang_kel_sil_sisi_a_3,
				$l->temp_gas_buang_kel_sil_sisi_a_4,
				$l->temp_gas_buang_kel_sil_sisi_a_5,
				$l->temp_gas_buang_kel_sil_sisi_a_6,
				$l->temp_gas_buang_kel_sil_sisi_b_1,
				$l->temp_gas_buang_kel_sil_sisi_b_2,
				$l->temp_gas_buang_kel_sil_sisi_b_3,
				$l->temp_gas_buang_kel_sil_sisi_b_4,
				$l->temp_gas_buang_kel_sil_sisi_b_5,
				$l->temp_gas_buang_kel_sil_sisi_b_6,
				$l->temp_gas_buang_turbo_a_masuk,
				$l->temp_gas_buang_turbo_a_keluar,
				$l->temp_gas_buang_turbo_b_masuk,
				$l->temp_gas_buang_turbo_b_keluar,
				$l->temp_air_pen_mes,
				$l->temp_air_pen_inj,
				$l->temp_minyak_pelumas,
				$l->temp_bahan_bakar,
				$l->temp_raw_water,
				$l->temp_udara_masuk,
				$l->temp_bearing_gen_1,
				$l->temp_bearing_gen_2,
				$l->temp_trust_bearing,
				$l->temp_main_bearing_1,
				$l->temp_main_bearing_2,
				$l->temp_main_bearing_3,
				$l->temp_main_bearing_4,
				$l->temp_main_bearing_5,
				$l->temp_main_bearing_6,
				$l->temp_main_bearing_7,
				$l->temp_stator_1,
				$l->temp_stator_2,
				$l->temp_stator_3,
				$l->temp_stator_4,
				$l->temp_stator_5,
				$l->temp_stator_6,
				$l->put_turbo_a,
				$l->put_turbo_b,
				$l->time_check,
				$l->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A17', false, false);

		   //EXPORT
		   $filename = 'ZAV Logs - ' . $r->date;
		   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		   header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		   $writer = IOFactory::createWriter($excel, 'Xlsx');
		   $writer->save('php://output');

	}

    public function niigataExport(Request $r)
    {
        $reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('niigata-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDUnit::find($r->unit_id);
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $eng_logs = PLTDNiigataEngLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
        foreach ($eng_logs as $l) {
            array_push($data, array(
				$l->jam,
				$l->tek_air_pen_mas_mes,
				$l->tek_air_pen_mas_inter,
				$l->tek_minyak_pelumas_mas_mes,
				$l->tek_udara_bilas_a,
				$l->tek_udara_bilas_b,
				$l->tek_bah_bak_mas_mes,
				$l->tek_minyak_pelumas_tuas_katup,
				$l->tek_minyak_pend_injektor,
				$l->gas_buang,
				$l->load_limit_gov,
				$l->rack_bahan_bakar_sil_a_1a,
				$l->rack_bahan_bakar_sil_a_2a,
				$l->rack_bahan_bakar_sil_a_3a,
				$l->rack_bahan_bakar_sil_a_4a,
				$l->rack_bahan_bakar_sil_a_5a,
				$l->rack_bahan_bakar_sil_a_6a,
				$l->rack_bahan_bakar_sil_b_1b,
				$l->rack_bahan_bakar_sil_b_2b,
				$l->rack_bahan_bakar_sil_b_3b,
				$l->rack_bahan_bakar_sil_b_4b,
				$l->rack_bahan_bakar_sil_b_5b,
				$l->rack_bahan_bakar_sil_b_6b,
				$l->temp_bah_bak_mas_mes,
				$l->temp_minyak_pen_inj_masuk,
				$l->temp_minyak_pen_inj_keluar,
				$l->temp_air_pen_kel_sil_a_1a,
				$l->temp_air_pen_kel_sil_a_2a,
				$l->temp_air_pen_kel_sil_a_3a,
				$l->temp_air_pen_kel_sil_a_4a,
				$l->temp_air_pen_kel_sil_a_5a,
				$l->temp_air_pen_kel_sil_a_6a,
				$l->temp_air_pen_kel_sil_b_1b,
				$l->temp_air_pen_kel_sil_b_2b,
				$l->temp_air_pen_kel_sil_b_3b,
				$l->temp_air_pen_kel_sil_b_4b,
				$l->temp_air_pen_kel_sil_b_5b,
				$l->temp_air_pen_kel_sil_b_6b,
				$l->temp_udara_mas_inter_a,
				$l->temp_udara_mas_inter_b,
				$l->temp_udara_kel_inter_a,
				$l->temp_udara_kel_inter_b,
				$l->temp_udara_masuk_filter,
				$l->temp_rad_minyak_pel_masuk,
				$l->temp_rad_minyak_pel_keluar,
				$l->temp_rad_air_pend_mes_masuk,
				$l->temp_rad_air_pend_mes_keluar,
				$l->temp_rad_air_pend_inter_masuk,
				$l->temp_rad_air_pend_inter_keluar,
				$l->temp_minyak_pel_masmes,
				$l->kwh_ps,
				$l->kwh_hsd,
				$l->kwh_mfo,
				$l->stand_flow_meter_hsd,
				$l->stand_flow_meter_in,
				$l->stand_flow_meter_return,
				$l->time_check,
				$l->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A19', false, false);

        $excel->setActiveSheetIndex(1);
        // where('tanggal', $r->date)->
        $gen_logs = PLTDNiigataGenLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
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
				$l->excit_arus,
				$l->excit_teg,
				$l->winding_1,
				$l->winding_2,
				$l->winding_3,
				$l->bearing,
				$l->pug_masuk,
				$l->pug_keluar,
				$l->put_turbo_a,
				$l->put_turbo_b,
				$l->sikap_kwh_meter,
				$l->level_becom,
				$l->r,
				$l->s,
				$l->t,
				$l->mw,
				$l->air_pen_mes_masuk,
				$l->air_pen_mes_keluar,
				$l->minyak_pelumas_masuk,
				$l->minyak_pelumas_keluar,
				$l->udara_bilas_a,
				$l->udara_bilas_b,
				$l->air_pen_ud_mas,
				$l->gas_buang_sil_sis_a1,
				$l->gas_buang_sil_sis_a2,
				$l->gas_buang_sil_sis_a3,
				$l->gas_buang_sil_sis_a4,
				$l->gas_buang_sil_sis_a5,
				$l->gas_buang_sil_sis_a6,
				$l->gas_buang_sil_sis_b1,
				$l->gas_buang_sil_sis_b2,
				$l->gas_buang_sil_sis_b3,
				$l->gas_buang_sil_sis_b4,
				$l->gas_buang_sil_sis_b5,
				$l->gas_buang_sil_sis_b6,
				$l->turbo_la,
				$l->turbo_lb,
				$l->turbo_ra,
				$l->turbo_rb,
				$l->time_check,
				$l->users->name,
				));
        }

        $excel->getActiveSheet()->fromArray($data, null, 'A18', false, false);

          //EXPORT
		   $filename = 'NIIGATA Logs - ' . $r->date;
		   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		   header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		   $writer = IOFactory::createWriter($excel, 'Xlsx');
		   $writer->save('php://output');
    }

    public function ogfExport(Request $r)
    {
        $reader = IOFactory::createReader('Xlsx');
        //load file template
        $excel = $reader->load('ogf-log.xlsx');
        //sheet yg di tuju
        $unit = PLTDUnit::find($r->unit_id);
        // Unit1LogBoilerFans
        $excel->setActiveSheetIndex(0);
        // where('tanggal', $r->date)->
        $ogf_cr = PLTDOgfCrLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
        foreach ($ogf_cr as $log) {
            array_push($data, array(
				$log->jam,
				$log->gi_r ,
				$log->gi_s ,
				$log->gi_t ,
				$log->gi_kw ,
				$log->sewa1_r ,
				$log->sewa1_s ,
				$log->sewa1_t ,
				$log->sewa1_kw ,
				$log->sewa2_r ,
				$log->sewa2_s ,
				$log->sewa2_t ,
				$log->sewa2_kw ,
				$log->panaraga_r ,
				$log->panaraga_s ,
				$log->panaraga_t ,
				$log->panaraga_kw ,
				$log->praya_r ,
				$log->praya_s ,
				$log->praya_t ,
				$log->praya_kw ,
				$log->taman_r ,
				$log->taman_s ,
				$log->taman_t ,
				$log->taman_kw ,
				$log->seng_r ,
				$log->seng_s ,
				$log->seng_t ,
				$log->seng_kw ,
				$log->kopang_r ,
				$log->kopang_s ,
				$log->kopang_t ,
				$log->kopang_kw ,
				$log->gomong_r ,
				$log->gomong_s ,
				$log->gomong_t ,
				$log->gomong_kw ,
				$log->kediri_r ,
				$log->kediri_s ,
				$log->kediri_t ,
				$log->kediri_kw ,
				$log->gi2_r ,
				$log->gi2_s ,
				$log->gi2_t ,
				$log->gi2_kw ,
				$log->biau_r ,
				$log->biau_s ,
				$log->biau_t ,
				$log->biau_kw ,
				$log->time_check,
				$log->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A9', false, false);


        $excel->setActiveSheetIndex(1);
        // where('tanggal', $r->date)->
        $ogf_sg = PLTDOgfSgLog::where('tanggal', $r->date)->where('pltd_unit_id',$unit->id)->orderBy('jam','asc')->get();
        // return $eng_logs;
        $data = [];
        foreach ($ogf_sg as $log) {
            array_push($data, array(
				$log->jam,
				$log->panaraga_analog ,
				$log->panaraga_digital ,
				$log->ps9_analog ,
				$log->ps9_digital ,
				$log->praya_analog ,
				$log->praya_digital ,
				$log->seng_analog ,
				$log->seng_digital ,
				$log->kopang_analog ,
				$log->kopang_digital ,
				$log->gomong_analog ,
				$log->gomong_digital ,
				$log->kediri_analog ,
				$log->kediri_digital ,
				$log->taman_a_analog_imp ,
				$log->taman_a_analog_exp ,
				$log->taman_a_digital_imp ,
				$log->taman_a_digital_exp ,
				$log->biau_analog_imp ,
				$log->biau_analog_exp ,
				$log->biau_digital_imp ,
				$log->biau_digital_exp ,
				$log->sewa1_imp ,
				$log->sewa1_exp ,
				$log->sewa2_imp ,
				$log->sewa2_exp ,
				$log->gi1_imp ,
				$log->gi1_exp ,
				$log->gi2_imp ,
				$log->gi2_exp ,
				$log->inc1_imp ,
				$log->inc1_exp ,
				$log->inc1_kw ,
				$log->inc2_imp ,
				$log->inc2_exp ,
				$log->inc2_kw ,
				$log->inc3_imp ,
				$log->inc3_exp ,
				$log->inc3_kw ,
				$log->inc4_imp ,
				$log->inc4_exp ,
				$log->inc4_kw ,
				$log->inc5_imp ,
				$log->inc5_exp ,
				$log->inc5_kw ,
				$log->inc6_imp ,
				$log->inc6_exp ,
				$log->inc6_kw ,
				$log->out1_imp ,
				$log->out1_exp ,
				$log->out1_kw ,
				$log->out2_imp ,
				$log->out2_exp ,
				$log->out2_kw ,
				$log->out3_imp ,
				$log->out3_exp ,
				$log->out3_kw ,
				$log->real_time,
				$log->users->name,
				));
        }
        $excel->getActiveSheet()->fromArray($data, null, 'A9', false, false);
            //EXPORT
            $filename = 'OGF Logs - ' . $r->date;
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
    }


}
