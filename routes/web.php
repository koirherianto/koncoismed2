<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select;
use App\Http\Livewire\LivewireCharts;
use App\Http\Controller\RelawanController;
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

// Route::get('/', function () {
//     return redirect(route('home'));
// });
Route::get('/', function(){
    return view('web.frontend.beranda.welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    // "spatie/laravel-medialibrary-pro": "2.0.0",
    // Route::mediaLibrary();

    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('agamas', App\Http\Controllers\AgamaController::class);
        Route::resource('sukus', App\Http\Controllers\SukuController::class);
        Route::resource('partais', App\Http\Controllers\PartaiController::class);
        Route::resource('jenisKandidats', App\Http\Controllers\JenisKandidatController::class);
        Route::resource('roles', App\Http\Controllers\RoleController::class);
        Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    });
    Route::group(['middleware' => ['role:super-admin|admin-kandidat-premium|admin-kandidat-free']], function () {
       
    });       
    
    Route::group(['middleware' => ['kandidat_person_confirm']], function () {
            Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store']);
            Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
            // Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('profil', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');
            Route::get('editProfil/{id}', [App\Http\Controllers\UserController::class, 'editProfiles']);
            Route::patch('updateProfile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);
            
            Route::group(['middleware' => ['adm_kandidat_confirm']], function () {
                Route::resource('relawans', App\Http\Controllers\RelawanController::class);
            });
            
            Route::resource('dpts', App\Http\Controllers\DptController::class);
            Route::resource('users', App\Http\Controllers\UserController::class);

            Route::get('visualisasi-kandidat', [App\Http\Controllers\HomeController::class, 'visualisasiKandidat'])->name('visualisasikandidat');
        });

        //mains
        Route::resource('kandidats', App\Http\Controllers\KandidatController::class);
        Route::resource('people', App\Http\Controllers\PersonController::class);
        Route::get('create-kandidat', [App\Http\Controllers\HomeController::class, 'createKandidat'])->name('createKandidat');
        Route::get('create-person', [App\Http\Controllers\HomeController::class, 'createPerson'])->name('createPerson');
        Route::get('create-wakil-person', [App\Http\Controllers\HomeController::class, 'createWakilPerson'])->name('createWakilPerson');
        Route::get('relawan-adm-kandidat-dua', [App\Http\Controllers\RelawanController::class, 'tambahRelawanPenuh'])->name('relawanpenuh');

        //fitur peta
        
        Route::get('map-relawan', [App\Http\Controllers\RelawanMapController::class,'index'])->name('petaRelawan');
        Route::get('titik-peta-relawan', [App\Http\Controllers\RelawanMapController::class,'jsonRelawan'])->name('titik-peta-relawan');

        //fitur import export
        Route::get('import-relawan', [App\Http\Controllers\RelawanController::class, 'importRelawan'])->name('importRelawan');
        Route::post('relawans-import',[App\Http\Controllers\RelawanController::class, 'import'])->name('relawans.import');
        Route::get('download-format', [App\Http\Controllers\RelawanController::class,'downloadFormat'])->name('downloadFormat');
        Route::get('export/excel/relawan',[App\Http\Controllers\RelawanController::class, 'export_excel'])->name('export.excel');
        
    }); 

    //captcha
    Route::get('/contact-form', [RegisterController::class, 'index']);
    Route::post('/captcha-validation', [RegisterController::class, 'validator']);
    Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha']);
    Route::get('/contact-form', [LoginController::class, 'index']);
    Route::post('/captcha-validation', [LoginController::class, 'capthcaFormValidate']);
    Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

    //livewire
    Route::get('select', Select::class);
    Route::get('selectwilayahkandidat', Select::class);
    Route::get('livewire-chart', LivewireCharts::class);
    Route::get('livewire-chart', [App\Http\Livewire\LivewireCharts::class,'render']);

    Route::group(['middleware' => ['role:admin-kandidat-premium|admin-kandidat-free']], function () {
       //route dpt master
        Route::resource('dpt-masters', App\Http\Controllers\DptMasterController::class);
        //tampilan import excel
        Route::get('import-dpt-masters', [App\Http\Controllers\DptMasterController::class, 'importDpt'])->name('import-dpt-masters');
        //upload import excel
        Route::post('dpt-masters-import',[App\Http\Controllers\DptMasterController::class, 'import'])->name('dpt-masters.import');
        //download format import dpt master 
        Route::get('download-format-dpt', [App\Http\Controllers\DptMasterController::class,'downloadFormat'])->name('download-format-dpt');
        //export dpt
        Route::get('export/excel',[App\Http\Controllers\DptMasterController::class, 'export_excel'])->name('export-dpt-masters');
    });  
    
