<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsheetController;
use App\Http\Controllers\PLTDNiigataEngLogController;
use App\Http\Controllers\PLTDNiigataGenLogController;
use App\Http\Controllers\PLTMHNarmadaLogsheetController;
use App\Http\Controllers\PLTMHPenggaLogsheetController;
use App\Http\Controllers\PLTMHSantongLogsheetController;
use App\Http\Controllers\PLTSGALogsheetController;
use App\Http\Controllers\PLTSGMLogsheetController;
use App\Http\Controllers\PLTSLogsheetController;
use App\Http\Controllers\PLTDAmpController;
use App\Http\Controllers\PLTDOgfCrLogController;
use App\Http\Controllers\PLTDOgfSgLogController;
use App\Http\Controllers\PLTDZAVCmrLogController;
use App\Http\Controllers\PLTDZAVEngLogController;
use App\Http\Controllers\PLTDZAVGenLogController;
use App\Http\Controllers\PLTDZVEngLogController;
use App\Http\Controllers\PLTDZVGenLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'pltd-amp', 'middleware' => 'auth'], function () {
    Route::get('/', [PLTDAmpController::class, 'index']);
    Route::get('niigata', [LogsheetController::class, 'niigataDashboard']);
    Route::get('niigata/gen-log', [PLTDNiigataGenLogController::class, 'view']);
    Route::get('niigata/gen-log/load-data', [PLTDNiigataGenLogController::class, 'loadData']);
    Route::get('niigata/export', [PLTDAmpController::class, 'niigataExport']);

    Route::get('niigata/eng-log', [PLTDNiigataEngLogController::class, 'view']);
    Route::get('niigata/eng-log/load-data', [PLTDNiigataEngLogController::class, 'loadData']);

    Route::get('zv/eng-log', [PLTDZVEngLogController::class, 'view']);
    Route::get('zv/eng-log/load-data', [PLTDZVEngLogController::class, 'loadData']);

    Route::get('zv/gen-log', [PLTDZVGenLogController::class, 'view']);
    Route::get('zv/gen-log/load-data', [PLTDZVGenLogController::class, 'loadData']);
    Route::get('zv/gen-log/detail', [PLTDZVGenLogController::class, 'detail']);
    Route::get('zv/export', [PLTDAmpController::class, 'zvExport']);

    Route::get('zav/eng-log', [PLTDZAVEngLogController::class, 'view']);
    Route::get('zav/eng-log/load-data', [PLTDZAVEngLogController::class, 'loadData']);
    Route::get('zav/eng-log/detail', [PLTDZAVEngLogController::class, 'detail']);
    Route::post('zav/eng-log/create', [PLTDZAVEngLogController::class, 'create']);

    Route::get('zav/gen-log', [PLTDZAVGenLogController::class, 'view']);
    Route::get('zav/gen-log/load-data', [PLTDZAVGenLogController::class, 'loadData']);
    Route::get('zav/gen-log/detail', [PLTDZAVGenLogController::class, 'detail']);
    Route::post('zav/gen-log/create', [PLTDZAVGenLogController::class, 'create']);

    Route::get('zav/cmr-log', [PLTDZAVCmrLogController::class, 'view']);
    Route::get('zav/cmr-log/load-data', [PLTDZAVCmrLogController::class, 'loadData']);
    Route::get('zav/cmr-log/detail', [PLTDZAVCmrLogController::class, 'detail']);
    Route::post('zav/cmr-log/create', [PLTDZAVCmrLogController::class, 'create']);
    Route::get('zav/export', [PLTDAmpController::class, 'zavExport']);

    Route::get('ogf/cr-log', [PLTDOgfCrLogController::class, 'view']);
    Route::get('ogf/cr-log/load-data', [PLTDOgfCrLogController::class, 'loadData']);
    Route::get('ogf/cr-log/detail', [PLTDOgfCrLogController::class, 'detail']);
    Route::post('ogf/cr-log/create', [PLTDOgfCrLogController::class, 'create']);

    Route::get('ogf/sg-log', [PLTDOgfSgLogController::class, 'view']);
    Route::get('ogf/sg-log/load-data', [PLTDOgfSgLogController::class, 'loadData']);
    Route::get('ogf/sg-log/detail', [PLTDOgfSgLogController::class, 'detail']);
    Route::post('ogf/sg-log/create', [PLTDOgfSgLogController::class, 'create']);
    Route::get('ogf/export', [PLTDAmpController::class, 'ogfExport']);
});

Route::group(['prefix' => 'plts', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTSLogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTSLogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTSLogsheetController::class, 'export']);
});

Route::group(['prefix' => 'plts-gm', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTSGMLogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTSGMLogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTSGMLogsheetController::class, 'export']);
});

Route::group(['prefix' => 'plts-ga', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTSGALogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTSGALogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTSGALogsheetController::class, 'export']);
});

Route::group(['prefix' => 'pltmh-santong', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTMHSantongLogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTMHSantongLogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTMHSantongLogsheetController::class, 'export']);
});

Route::group(['prefix' => 'pltmh-pengga', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTMHPenggaLogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTMHPenggaLogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTMHPenggaLogsheetController::class, 'export']);
});

Route::group(['prefix' => 'pltmh-narmada', 'middleware' => 'auth'], function () {
    // Route::get('/', [LogsheetController::class, 'niigataDashboard']);
    Route::get('log', [PLTMHNarmadaLogsheetController::class, 'view']);
    Route::get('log/load-data', [PLTMHNarmadaLogsheetController::class, 'loadData']);
    Route::get('log/export', [PLTMHNarmadaLogsheetController::class, 'export']);
});

