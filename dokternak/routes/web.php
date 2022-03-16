<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//route tamu
Route::get('/', 'WelcomeController@index');
Route::POST('/tamu/cari', [App\Http\Controllers\WelcomeController::class, 'cari'])->name('tamu.cari');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('is_admin');
Route::get('lppetugas', [App\Http\Controllers\HomeController::class, 'lppetugas'])->name('lppetugas')->middleware('is_admin');
// Route::get('home', [HomeController::class, 'index'])->name('home');
Auth::routes();

// Route untuk Backend ----------------------------------------------------
Route::resource('admin', 'backend\AdminController');
Route::group(['namespace' => 'backend'], function()
{
    Route::resource('/dashboard/peternak', 'PeternakController');
    Route::resource('/dashboard/admin', 'AdminController');
    Route::resource('/dashboard/dtdokter', 'DataDokterController');
    Route::resource('/dashboard/data_tutorial', 'DataTutorialController');
    Route::resource('/dashboard/data_artikel', 'DataArtikelController');
    Route::resource('/dashboard/data_puskeswan', 'DataPuskeswanController');
    Route::resource('/dashboard/datapetugas', 'DataPetugasController');
    Route::resource('/dashboard/data_ks', 'DataKritikdanSaranController');
    Route::resource('/dashboard/dokumentasi', 'DokumentasiController');
    Route::resource('/dashboard/data_banner', 'DataBannerController');


//CRUD Data Artikel -------------------------------------------------------------------
// Route::get('/dashboard/data_artikel', 'backend/DataArtikelController@index');
Route::POST('dashboard/data_artikel/simpandata','DataArtikelController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_artikel/edit/{id}','DataArtikelController@edit');
Route::put('dashboard/data_artikel/{id}/konfirmasi','DataArtikelController@konfirmasi')->name('konfirmasi');
Route::put('dashboard/data_artikel/{id}/batalkonfirmasi','DataArtikelController@batalkonfirmasi')->name('batalkonfirmasi');
Route::GET('dashboard/data_artikel/delete/{id}','DataArtikelController@delete');
Route::get('/cetak_pdf/data_artikel','DataArtikelController@cetakartikel')->name('backend.data_artikel.cetak_pdf');

//CRUD Data Banner -------------------------------------------------------------------
Route::POST('dashboard/data_banner/simpandata','DataBannerController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_banner/edit/{id}','DataBannerController@edit');
Route::GET('dashboard/data_banner/delete/{id}','DataBannerController@delete');
Route::get('/cetak_pdf/data_banner','DataBannerController@cetak_pdf')->name('backend.data_banner.cetak_pdf');

//CRUD Data Tutorial -------------------------------------------------------------------
Route::POST('dashboard/data_tutorial/simpandata','DataTutorialController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_tutorial/edit/{id}','DataTutorialController@edit');
Route::GET('dashboard/data_tutorial/delete/{id}','DataTutorialController@delete');
Route::get('/cetak_pdf/data_tutorial','DataTutorialController@cetak_pdf')->name('backend.data_tutorial.cetak_pdf');

//CRUD Data Puskeswan -------------------------------------------------------------------
Route::POST('dashboard/data_puskeswan/simpandata','DataPuskeswanController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_puskeswan/edit/{id}','DataPuskeswanController@edit');
Route::GET('dashboard/data_puskeswan/delete/{id}','DataPuskeswanController@delete');
Route::get('/cetak_pdf/data_puskeswan','DataPuskeswanController@cetak_pdf')->name('backend.data_tutorial.cetak_pdf');

//CRUD Data Peternak -------------------------------------------------------------------
Route::POST('dashboard/peternak/simpandata','PeternakController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/peternak/edit/{id}','PeternakController@edit');
Route::GET('dashboard/peternak/delete/{id}','PeternakController@delete');
Route::get('/cetak_pdf/peternak','PeternakController@cetak_pdf')->name('backend.peternak.cetak_pdf');

//CRUD Data Petugas -------------------------------------------------------------------
Route::POST('dashboard/datapetugas/simpandata','DataPetugasController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/datapetugas/edit/{id}','DataPetugasController@edit');
Route::GET('dashboard/datapetugas/delete/{id}','DataPetugasController@delete');
Route::get('/cetak_pdf/datapetugas','DataPetugasController@cetak_pdf')->name('backend.datapetugas.cetak_pdf');

//CRUD Data admin -------------------------------------------------------------------
Route::POST('dashboard/admin/simpandata','AdminController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/admin/edit/{id}','AdminController@edit');
Route::GET('dashboard/admin/delete/{id}','AdminController@delete');
Route::get('/cetak_pdf/admin','AdminController@cetak_pdf')->name('backend.admin.cetak_pdf');

//CRUD Data Kritik dan saran -------------------------------------------------------------------
Route::POST('dashboard/data_ks/simpandata','DataKritikdanSaranController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_ks/edit/{id}','DataKritikdanSaranController@edit');
Route::GET('dashboard/data_ks/delete/{id}','DataKritikdanSaranController@delete');
Route::get('/cetak_pdf/data_ks','DataKritikdanSaranController@cetak_pdf')->name('backend.data_ks.cetak_pdf');

//CRUD Data dokter -------------------------------------------------------------------
Route::get('/cetak_pdf/dtdokter','DataDokterController@cetak_pdf')->name('backend.dokter.cetak_pdf');

});
// ------------------------------------------------------------------------

// Route untuk Petugas ----------------------------------------------------
Route::group(['namespace' => 'petugas'], function()
{
  Route::resource('petugas/tentangkami', 'TentangKamiController');
  Route::POST('petugas/tentangkami/kritiksaran','TentangKamiController@store')->name('kritiksaran.store');
    // Route::resource('petugas/artikel', 'ArtikelController');
    Route::resource('petugas/home', 'HomeController');
    Route::resource('petugas/detailartikel', 'DetailArtikelController');
    Route::resource('petugas/tutorial', 'TutorialController');
    Route::resource('petugas/tulisartikel', 'TulisArtikelController');
    Route::POST('petugas/tulisartikel/uploadartikel','TulisArtikelController@store')->name('uploadartikel');
    Route::resource('petugas/rekam-medik', 'RekammedikController');
    Route::resource('petugas/data-obat', 'DataObatController');
    Route::resource('petugas/respon-konsultasi', 'ResponKonsultasiController');
   // CRUD Rekam Medik -------------------------------------------------------
   Route::POST('petugas/rekam-medik/simpandata','RekammedikController@store')->name('simpandata');
   Route::match(['get','post'], 'petugas/rekam-medik/edit/{id}','RekammedikController@edit');
   Route::GET('petugas/rekam-medik/delete/{id}','RekammedikController@delete');
   Route::get('cetak_pdf/rekammedik','RekammedikController@cetakrmd')->name('petugas.rekam_medik.cetak_pdf');
   // -------------------------------------------------------------------------
   // CRUD Data Obat -------------------------------------------------------
   Route::POST('petugas/data-obat/simpanobat','DataObatController@store')->name('simpanobat');
   Route::match(['get','post'], 'petugas/data-obat/edit/{id}','DataObatController@edit');
   Route::GET('petugas/data-obat/delete/{id}','DataObatController@delete');
   Route::get('cetak_pdf/dataobat','DataObatController@cetakobat')->name('petugas.data_obat.cetak_pdf');
   // -------------------------------------------------------------------------
   //  Respon Konsultasi
   Route::get('/petugas/respon-konsultasi', 'ResponKonsultasiController@index')->name('respon.index');
   Route::POST('/petugas/respon-konsultasi/kirimbalasan', 'ResponKonsultasiController@store')->name('respon.store');
   Route::get('/petugas/respon-konsultasi/{id}/detail', 'ResponKonsultasiController@detail')->name('respon.detail');
   Route::get('/petugas/respon-konsultasi/{id}/detailterkirim', 'ResponKonsultasiController@detailterkirim')->name('respon.detailterkirim');
   Route::get('/petugas/respon-konsultasi/{id}/hapusterkirim/{idk}/riwayat','ResponKonsultasiController@hapusterkirim')->name('respon.hapusterkirim');
   //Route Profil
  //  Route::get('/profil', 'frontend\ProfilController@index')->name('profil.index');
   Route::get('lppetugas/editprofil/{id}', 'EditProfilController@edit')->name('editprofilpetugas.edit');
   Route::PUT('lppetugas/editprofil/{id}','EditProfilController@update')->name('editprofilpetugas.update');
});

// Route untuk Penyuluh ----------------------------------------------------
Route::group(['namespace' => 'penyuluh'], function()
{
  Route::resource('penyuluh/tentangkami', 'TentangKamiController');
  Route::POST('penyuluh/tentangkami/kritiksaran','TentangKamiController@store')->name('kritiksaran.store');
    // Route::resource('penyuluh/artikel', 'ArtikelController');
    Route::resource('penyuluh/home', 'HomeController');
    // Route::resource('penyuluh/detailartikel', 'DetailArtikelController');
    Route::resource('penyuluh/tutorial', 'TutorialController');
    Route::resource('penyuluh/tulisartikel', 'TulisArtikelController');
    Route::POST('penyuluh/tulisartikel/uploadartikel','TulisArtikelController@store')->name('uploadartikel');
    Route::resource('penyuluh/respon-konsultasi', 'ResponKonsultasiController');
   //  Respon Konsultasi
   Route::get('/penyuluh/respon-konsultasi', 'ResponKonsultasiController@index')->name('respon.index');
   Route::POST('/penyuluh/respon-konsultasi/kirimbalasan', 'ResponKonsultasiController@store')->name('respon.store');
   Route::get('/penyuluh/respon-konsultasi/{id}/detail', 'ResponKonsultasiController@detail')->name('respon.detail');
   Route::get('/penyuluh/respon-konsultasi/{id}/detailterkirim', 'ResponKonsultasiController@detailterkirim')->name('respon.detailterkirim');
   Route::get('/penyuluh/respon-konsultasi/{id}/hapusterkirim/{idk}/riwayat','ResponKonsultasiController@hapusterkirim')->name('respon.hapusterkirim');
   //Route Profil
  //  Route::get('/profil', 'frontend\ProfilController@index')->name('profil.index');
   Route::get('lppenyuluh/editprofil/{id}', 'EditProfilController@edit')->name('editprofilpenyuluh.edit');
   Route::PUT('lppenyuluh/editprofil/{id}','EditProfilController@update')->name('editprofilpenyuluh.update');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route landing page prtugas
Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');
Route::POST('/home/cari', [App\Http\Controllers\frontend\HomeController::class, 'cari'])->name('home.cari');

Route::get('admin/{id}', function ($id = null) {
  //  
})->middleware('auth');

//  ROUTE PETUGAS TAMBAHAN

//Route Reset Password
Route::get('/petugas/change-password', 'petugas\ResetPasswordController@changePassword')->name('petugas.change-password')->middleware('auth');
Route::POST('/petugas/update-password', 'petugas\ResetPasswordController@updatePassword')->name('petugas.update-password')->middleware('auth');

 //Route Artikel
 Route::get('petugas/artikel', 'petugas\ArtikelController@index');
 Route::get('petugas/artikel/cari', 'petugas\ArtikelController@cari');
 Route::get('petugas/artikel/kategori', 'petugas\ArtikelController@kategori');
 Route::get('petugas/artikel/{id}/detail', 'petugas\ArtikelController@detail');

 //route tutorial
Route::get('/petugas/tutorial', 'petugas\TutorialController@index');
Route::get('/petugas/tutorial/{id}/detail', 'petugas\TutorialController@detail');

// -----------------------------------------------------------------------------------------

//  ROUTE PENYULUH TAMBAHAN

//Route Reset Password
Route::get('/penyuluh/change-password', 'penyuluh\ResetPasswordController@changePassword')->name('penyuluh.change-password')->middleware('auth');
Route::POST('/penyuluh/update-password', 'penyuluh\ResetPasswordController@updatePassword')->name('penyuluh.update-password')->middleware('auth');

 //Route Artikel
 Route::get('penyuluh/artikel', 'penyuluh\ArtikelController@index');
 Route::get('penyuluh/artikel/cari', 'penyuluh\ArtikelController@cari');
 Route::get('penyuluh/artikel/kategori', 'penyuluh\ArtikelController@kategori');
 Route::get('penyuluh/artikel/{id}/detail', 'penyuluh\ArtikelController@detail');

 //route tutorial
Route::get('/penyuluh/tutorial', 'penyuluh\TutorialController@index');
Route::get('/penyuluh/tutorial/{id}/detail', 'penyuluh\TutorialController@detail');

// -----------------------------------------------------------------------------------------

//Route untuk Frontend----------------------------------------------------
Route::group(['namespace' => 'frontend'], function()
{
    // Route::resource('home', 'HomeController');
    // Route::resource('artikel', 'ArtikelController');
    // Route::resource('puskeswan', 'PuskeswanController');
    Route::resource('tentangkami', 'TentangKamiController');
    Route::POST('tentangkami/kritiksaran','TentangKamiController@store')->name('kritiksaran.store');
    Route::resource('dokter', 'DaftarDokterController');
    Route::resource('detailartikel', 'DetailArtikelController');
    Route::resource('tulisartikel', 'TulisArtikelController');
    Route::resource('tuliskonsultasi', 'TulisKonsultasiController');
    Route::resource('detailpuskeswan', 'DetailPuskeswanController');
    Route::resource('penyuluh', 'PenyuluhController');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route landing page frontend
Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');
Route::POST('/home/cari', [App\Http\Controllers\frontend\HomeController::class, 'cari'])->name('home.cari');
Route::get('/home/tutorial/{id}/detail', [App\Http\Controllers\frontend\HomeController::class, 'detail'])->name('home.detail');

Route::get('admin/{id}', function ($id = null) {
  //  
})->middleware('auth');

//Route Reset Password
Route::get('change-password', 'frontend\ResetPasswordController@changePassword')->name('change-password')->middleware('auth');
Route::POST('update-password', 'frontend\ResetPasswordController@updatePassword')->name('update-password')->middleware('auth');

//Route Artikel
Route::get('/artikel', 'Frontend\ArtikelController@index');
Route::get('/artikel/cari', 'Frontend\ArtikelController@cari');
Route::get('/artikel/kategori', 'Frontend\ArtikelController@kategori');
Route::get('/artikel/{id}/detail', 'frontend\ArtikelController@detail');

//Route Tutorial
//route tutorial
Route::get('/tutorial', 'frontend\TutorialController@index');
Route::get('/tutorial/{id}/detail', 'frontend\TutorialController@detail');

//route dokter
Route::get('/dokter', 'frontend\DaftarDokterController@index');
Route::get('/dokter/{id}/detail', 'frontend\DaftarDokterController@detail');
Route::POST('/dokter/cari', [App\Http\Controllers\frontend\DaftarDokterController::class, 'cari'])->name('dokter.cari');
Route::POST('/dokter/kategori', [App\Http\Controllers\frontend\DaftarDokterController::class, 'kategori'])->name('dokter.kategori');

//route penyuluh
Route::get('/penyuluh', 'frontend\PenyuluhController@index');
Route::get('/penyuluh/cari', 'frontend\PenyuluhController@cari');
Route::get('/penyuluh/{id}/detail', 'frontend\PenyuluhController@detail');
//Route::POST('/penyuluh/cari', [App\Http\Controllers\frontend\PenyuluhController::class, 'cari'])->name('penyuluh.cari');


//Route Puskeswan
Route::get('/puskeswan', 'frontend\PuskeswanController@index');
Route::get('/puskeswan/cari', 'frontend\PuskeswanController@cari');
Route::get('/puskeswan/{id}/detail', 'frontend\PuskeswanController@detail');

//Route Konsultasi
Route::get('/konsultasi', 'frontend\KonsultasiController@index')->name('konsultasi.index');
Route::get('/konsultasi/{id}/detail', 'frontend\KonsultasiController@detail')->name('konsultasi.detail');
Route::get('/konsultasi/{id}/detailmasuk/{idk}', 'frontend\KonsultasiController@detailmasuk')->name('konsultasi.detailmasuk');
Route::get('/konsultasi/{id}/hapus','frontend\KonsultasiController@hapus')->name('konsultasi.hapus');
Route::get('/konsultasi/{id}/hapusmasuk/{idk}/detail/{idr}','frontend\KonsultasiController@hapusmasuk')->name('konsultasi.hapusmasuk');

//Route Profil
Route::get('/profil', 'frontend\ProfilController@index')->name('profil.index');
Route::get('/editprofil/{id}', 'frontend\ProfilController@edit')->name('editprofil.edit');
Route::PUT('/editprofil/{id}','frontend\ProfilController@update')->name('editprofil.update');