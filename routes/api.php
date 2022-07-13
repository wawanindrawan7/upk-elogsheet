<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PLTDNiigataEngLogController;
use App\Http\Controllers\PLTDNiigataGenLogController;
use App\Http\Controllers\PLTDOgfCrLogController;
use App\Http\Controllers\PLTDOgfSgLogController;
use App\Http\Controllers\PLTDZAVCmrLogController;
use App\Http\Controllers\PLTDZAVEngLogController;
use App\Http\Controllers\PLTDZAVGenLogController;
use App\Http\Controllers\PLTDZVEngLogController;
use App\Http\Controllers\PLTDZVGenLogController;
use App\Http\Controllers\PLTMHNarmadaLogsheetController;
use App\Http\Controllers\PLTMHPenggaLogsheetController;
use App\Http\Controllers\PLTMHSantongLogsheetController;
use App\Http\Controllers\PLTSGALogsheetController;
use App\Http\Controllers\PLTSGMLogsheetController;
use App\Http\Controllers\PLTSLogsheetController;
use App\Models\PLTSLogsheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth', [LoginController::class, 'auth']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pltd-amp/unit/get-data', [LoginController::class, 'unit']);

Route::get('pltd-amp/niigata/gen-log', [PLTDNiigataGenLogController::class, 'loadData']);
Route::get('pltd-amp/niigata/gen-log/detail', [PLTDNiigataGenLogController::class, 'detail']);
Route::post('pltd-amp/niigata/gen-log/create', [PLTDNiigataGenLogController::class, 'create']);

Route::get('pltd-amp/niigata/eng-log', [PLTDNiigataEngLogController::class, 'loadData']);
Route::get('pltd-amp/niigata/eng-log/detail', [PLTDNiigataEngLogController::class, 'detail']);
Route::post('pltd-amp/niigata/eng-log/create', [PLTDNiigataEngLogController::class, 'create']);

Route::get('pltd-amp/zv/eng-log', [PLTDZVEngLogController::class, 'loadData']);
Route::get('pltd-amp/zv/eng-log/detail', [PLTDZVEngLogController::class, 'detail']);
Route::post('pltd-amp/zv/eng-log/create', [PLTDZVEngLogController::class, 'create']);

Route::get('pltd-amp/zv/gen-log', [PLTDZVGenLogController::class, 'loadData']);
Route::get('pltd-amp/zv/gen-log/detail', [PLTDZVGenLogController::class, 'detail']);
Route::post('pltd-amp/zv/gen-log/create', [PLTDZVGenLogController::class, 'create']);

Route::get('pltd-amp/zav/eng-log', [PLTDZAVEngLogController::class, 'loadData']);
Route::get('pltd-amp/zav/eng-log/detail', [PLTDZAVEngLogController::class, 'detail']);
Route::post('pltd-amp/zav/eng-log/create', [PLTDZAVEngLogController::class, 'create']);

Route::get('pltd-amp/zav/gen-log', [PLTDZAVGenLogController::class, 'loadData']);
Route::get('pltd-amp/zav/gen-log/detail', [PLTDZAVGenLogController::class, 'detail']);
Route::post('pltd-amp/zav/gen-log/create', [PLTDZAVGenLogController::class, 'create']);

Route::get('pltd-amp/zav/cmr-log', [PLTDZAVCmrLogController::class, 'loadData']);
Route::get('pltd-amp/zav/cmr-log/detail', [PLTDZAVCmrLogController::class, 'detail']);
Route::post('pltd-amp/zav/cmr-log/create', [PLTDZAVCmrLogController::class, 'create']);

Route::get('pltd-amp/ogf/cr-log', [PLTDOgfCrLogController::class, 'loadData']);
Route::get('pltd-amp/ogf/cr-log/detail', [PLTDOgfCrLogController::class, 'detail']);
Route::post('pltd-amp/ogf/cr-log/create', [PLTDOgfCrLogController::class, 'create']);

Route::get('pltd-amp/ogf/sg-log', [PLTDOgfSgLogController::class, 'loadData']);
Route::get('pltd-amp/ogf/sg-log/detail', [PLTDOgfSgLogController::class, 'detail']);
Route::post('pltd-amp/ogf/sg-log/create', [PLTDOgfSgLogController::class, 'create']);


Route::get('plts/log', [PLTSLogsheetController::class, 'loadData']);
Route::post('plts/log/create', [PLTSLogsheetController::class, 'create']);

Route::get('plts-gm/log', [PLTSGMLogsheetController::class, 'loadData']);
Route::post('plts-gm/log/create', [PLTSGMLogsheetController::class, 'create']);

Route::get('plts-ga/log', [PLTSGALogsheetController::class, 'loadData']);
Route::post('plts-ga/log/create', [PLTSGALogsheetController::class, 'create']);

Route::get('pltmh-santong/log', [PLTMHSantongLogsheetController::class, 'loadData']);
Route::post('pltmh-santong/log/create', [PLTMHSantongLogsheetController::class, 'create']);

Route::get('pltmh-pengga/log', [PLTMHPenggaLogsheetController::class, 'loadData']);
Route::post('pltmh-pengga/log/create', [PLTMHPenggaLogsheetController::class, 'create']);

Route::get('pltmh-narmada/log', [PLTMHNarmadaLogsheetController::class, 'loadData']);
Route::post('pltmh-narmada/log/create', [PLTMHNarmadaLogsheetController::class, 'create']);
