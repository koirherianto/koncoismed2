<?php

use App\Http\Controllers\API\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KandidatAPIController;
use App\Http\Controllers\API\DptAPIController;
use App\Http\Controllers\API\PersonAPIController;
use App\Http\Controllers\API\RelawanAPIController;
use App\Http\Controllers\API\WilayahAPIController;
use App\Http\Controllers\API\ChartApiController;
use App\Http\Controllers\API\ChartRelawanApiController;


Route::post('auth/register', [AuthApiController::class, 'register']);
Route::post('auth/login', [AuthApiController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthApiController::class, 'logout']);
    Route::post('auth/me', [AuthApiController::class, 'me']);
    Route::put('auth/updatePassword', [AuthApiController::class, 'updatePassword']);
    Route::put('auth/update/{user:id}', [AuthApiController::class, 'update']);
    
    Route::put('kandidats/updateNumber', [KandidatAPIController::class, 'updateKandidatNumber']);

    // Route::post('kandidats/iskandidatexis', [KandidatAPIController::class, 'isKandidatExis']);
    // Route::post('kandidats/getsetkandidat', [KandidatAPIController::class, 'getSetKandidat']);
    // Route::resource('kandidats', KandidatAPIController::class)->except(['create', 'edit']);

    // Route::get('people/ispersonexis', [PersonAPIController::class, 'isPersonExis']);
    // Route::get('people/iswakilexis', [PersonAPIController::class, 'isWakilExis']);
    // Route::post('people/getsetperson', [PersonAPIController::class, 'getSetPerson']);
    // Route::post('people/getsetwakil', [PersonAPIController::class, 'getSetWakil']);
    // Route::resource('people', PersonAPIController::class)->except(['create', 'edit']);

    // Route::post('dpts/getset', [DptAPIController::class, 'getSet']);\\

    //Chart
    Route::get('chart/pertumbuhandpt', [ChartApiController::class, 'getChartPertumbuhanDpt']);
    Route::get('chart/gender', [ChartApiController::class, 'getChartGender']);
    Route::get('chart/agama', [ChartApiController::class, 'getChartAgama']);
    Route::get('chart/suku', [ChartApiController::class, 'getChartSuku']);
    Route::get('chart/wilayah', [ChartApiController::class, 'getChartWilayah']);
    Route::get('chart/wilayahgender', [ChartApiController::class, 'getChartWilayahGender']);
    Route::get('chart/jumlahdpt', [ChartApiController::class, 'getJumlahDpt']);
    Route::get('chart/rangeumurdpt', [ChartApiController::class, 'getRangeUmurDpt']);
    
    Route::get('chart/relawan/pertumbuhanrelawan', [ChartRelawanApiController::class, 'getChartPertumbuhanRelawan']);
    Route::get('chart/relawan/gender', [ChartRelawanApiController::class, 'getChartGenderRelawan']);
    Route::get('chart/relawan/getusiagender', [ChartRelawanApiController::class, 'getUsiaGender']);
    Route::get('chart/relawan/getwilayahgender', [ChartRelawanApiController::class, 'getChartWilayahGender']);
    Route::get('chart/relawan/jumlahrelawan', [ChartRelawanApiController::class, 'getJumlahRelawan']);
    Route::get('chart/relawan/statuspernikahan', [ChartRelawanApiController::class, 'getStatusPerkawinanRelawan']);
    Route::get('chart/relawan/rangeumur', [ChartRelawanApiController::class, 'getRangeUmurRelawan']);

    
    Route::resource('dpts', DptAPIController::class)->except(['create', 'edit']);
    Route::post('dpts/carinik', [DptAPIController::class, 'cariNik']);
    Route::post('dpts/updateimage/{id}', [DptAPIController::class, 'updateImage']);

    Route::post('relawans/updateimage/{id}', [RelawanAPIController::class, 'updateImage']);
    Route::put('relawanpassword/{id}',[RelawanAPIController::class,"updatePass"]);
    Route::resource('relawans', RelawanAPIController::class)
    ->except(['create', 'edit']);
    

    // Route::get('qqq', function() {
    // });
});


Route::post('wilayah/provinsi', [WilayahAPIController::class, 'getProvinsi']);
Route::post('wilayah/kabkota', [WilayahAPIController::class, 'getKabKota']);
Route::post('wilayah/kecamatan', [WilayahAPIController::class, 'getKecamatan']);
Route::post('wilayah/desa', [WilayahAPIController::class, 'getDesa']);
Route::post('wilayah/detail', [WilayahAPIController::class, 'detailWilayahById']);


Route::resource('agamas', App\Http\Controllers\API\AgamaAPIController::class)
    ->except(['create', 'edit']);
Route::get('jeniskandidats', [App\Http\Controllers\API\SukuAPIController::class, 'getJenisKandidats']);
Route::resource('sukus', App\Http\Controllers\API\SukuAPIController::class)
    ->except(['create', 'edit']);

