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
Route::get('dbstaf', [App\Http\Controllers\HomeController::class, 'dbstaf'])->name('dbstaf')->middleware('is_admin');
Route::get('dbkopus', [App\Http\Controllers\HomeController::class, 'dbkopus'])->name('dbkopus')->middleware('is_admin');
// Route::get('home', [HomeController::class, 'index'])->name('home');
Auth::routes();

// Route untuk Koordinator Puskeswan
Route::group(['namespace' => 'kopus'], function()
{
    // Puskeswan
    Route::resource('/dbkopus/tabel_puskeswan', 'DataPuskeswanController');
    Route::get('/dbkopus/tabel_puskeswan/{id}/detail','DataPuskeswanController@detail');
    Route::match(['get','post'], 'dbkopus/tabel_puskeswan/edit/{id}','DataPuskeswanController@edit');
    //CRUD Data Puskeswan -------------------------------------------------------------------
    Route::POST('dbkopus/tabel_puskeswan/simpandata','DataPuskeswanController@store')->name('simpandata');
    Route::match(['get','post'], '/dbstaf/tabel_puskeswan/edit/{id}','DataPuskeswanController@edit');
    Route::GET('/dbkopus/tabel_puskeswan/delete/{id}','DataPuskeswanController@delete');
    Route::get('/cetak_pdf/tabel_puskeswan/{id}','DataPuskeswanController@cetak_pdf')->name('tabel_puskeswan.cetak_pdf');

     // Dokter/Petugas Puskeswan
     Route::resource('/dbkopus/tabel_dokpus', 'DataDokpusController');
     //CRUD Data Dokpus -------------------------------------------------------------------
     Route::match(['get','post'], 'dbkopus/tabel_dokpus/edit/{id}','DataDokpusController@edit');
     Route::GET('dbkopus/tabel_dokpus/delete/{id}','DataDokpusController@delete');
     Route::get('/cetak_pdf/tabel_dokpus','DataDokpusController@cetak_pdf')->name('tabel_dokpus.cetak_pdf');

     // Dokter/Petugas
    Route::resource('/dbkopus/tabel_dokter', 'DataDokterController');
    Route::get('/dbkopus/tabel_dokter/{id}/detail','DataDokterController@detail');
    //CRUD Data Dokter/Petugas -------------------------------------------------------------------
    Route::match(['get','post'], 'dbkopus/tabel_artikel/edit/{id}','DataDokterController@edit');
    Route::GET('dbkopus/tabel_dokter/delete/{id}','DataDokterController@delete');
    Route::get('/cetak_pdf/tabel_dokter','DataDokterController@cetak_pdf')->name('tabel_dokter.cetak_pdf');

    // Profil akun dan edit profil
    Route::resource('/dbkopus/tabel_profil', 'ProfilController');
    Route::match(['get','post'], 'dbkopus/tabel_profil/edit/{id}','ProfilController@edit');
});

// Route untuk Staf it ---------------------------------------------------
Route::group(['namespace' => 'staf'], function()
{
    // Artikel
    Route::resource('/dbstaf/dt_artikel', 'DataArtikelController');
    Route::get('/dbstaf/dt_artikel/{id}/detail','DataArtikelController@detail');
    //CRUD Data Artikel -------------------------------------------------------------------
    Route::POST('dbstaf/dt_artikel/simpandata','DataArtikelController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_artikel/edit/{id}','DataArtikelController@edit');
    Route::put('dbstaf/dt_artikel/{id}/konfirmasi','DataArtikelController@konfirmasi')->name('dt_artikel.konfirmasi');
    Route::put('dbstaf/dt_artikel/{id}/batalkonfirmasi','DataArtikelController@batalkonfirmasi')->name('dt_artikel.batalkonfirmasi');
    Route::GET('dbstaf/dt_artikel/delete/{id}','DataArtikelController@delete');
    Route::get('/cetak_pdf/dt_artikel','DataArtikelController@cetakartikel')->name('dt_artikel.cetak_pdf');

    // Dokter/Petugas
    Route::resource('/dbstaf/dt_dokter', 'DataDokterController');
    Route::get('/dbstaf/dt_dokter/{id}/detail','DataDokterController@detail');
    //CRUD Data Dokter/Petugas -------------------------------------------------------------------
    Route::POST('dbstaf/dt_dokter/simpandata','DataDokterController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_artikel/edit/{id}','DataDokterController@edit');
    Route::GET('dbstaf/dt_dokter/delete/{id}','DataDokterController@delete');
    Route::get('/cetak_pdf/dt_dokter','DataDokterController@cetak_pdf')->name('dt_dokter.cetak_pdf');

    // Puskeswan
    Route::resource('/dbstaf/dt_puskeswan', 'DataPuskeswanController');
    Route::get('/dbstaf/dt_puskeswan/{id}/detail','DataPuskeswanController@detail');
    //CRUD Data Dokter/Petugas -------------------------------------------------------------------
    Route::POST('dbstaf/dt_puskeswan/simpandata','DataPuskeswanController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_puskeswan/edit/{id}','DataPuskeswanController@edit');
    Route::GET('dbstaf/dt_puskeswan/delete/{id}','DataPuskeswanController@delete');
    Route::get('/cetak_pdf/dt_puskeswan','DataPuskeswanController@cetak_pdf')->name('dt_puskeswan.cetak_pdf');

    // Penyuluh
    Route::resource('/dbstaf/dt_penyuluh', 'DataPenyuluhController');
    Route::get('/dbstaf/dt_penyuluh/{id}/detail','DataPenyuluhController@detail');
    //CRUD Data Penyuluh -------------------------------------------------------------------
    Route::POST('dbstaf/dt_penyuluh/simpandata','DataPenyuluhController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_penyuluh/edit/{id}','DataPenyuluhController@edit');
    Route::GET('dbstaf/dt_penyuluh/delete/{id}','DataPenyuluhController@delete');
    Route::get('/cetak_pdf/dt_penyuluh','DataPenyuluhController@cetak_pdf')->name('dt_penyuluh.cetak_pdf');

    // Staf
    Route::resource('/dbstaf/dt_staf', 'DataStafController');
    Route::get('/dbstaf/dt_staf/{id}/detail','DataStafController@detail');
    //CRUD Data Staf -------------------------------------------------------------------
    Route::match(['get','post'], 'dbstaf/dt_staf/edit/{id}','DataStafController@edit');
    Route::GET('dbstaf/dt_staf/delete/{id}','DataStafController@delete');
    Route::get('/cetak_pdf/dt_staf','DataStafController@cetak_pdf')->name('dt_staf.cetak_pdf');

    // Dokter Puskeswan
    Route::resource('/dbstaf/dt_dokpus', 'DataDokpusController');
    //CRUD Data Dokpus -------------------------------------------------------------------
    Route::match(['get','post'], 'dbstaf/dt_dokpus/edit/{id}','DataDokpusController@edit');
    Route::GET('dbstaf/dt_dokpus/delete/{id}','DataDokpusController@delete');
    Route::get('/cetak_pdf/dt_dokpus','DataDokpusController@cetak_pdf')->name('dt_dokpus.cetak_pdf');

    // CRUD Data Informasi
    Route::resource('/dbstaf/dt_informasi', 'DataInformasiController');
    Route::get('/dbstaf/dt_informasi/{id}/detail','DataInformasiController@detail');
    Route::POST('dbstaf/dt_informasi/simpandata','DataInformasiController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_informasi/edit/{id}','DataInformasiController@edit');
    Route::GET('dbstaf/dt_informasi/delete/{id}','DataInformasiController@delete');
    Route::get('/cetak_pdf/dt_informasi','DataInformasiController@cetakinformasi')->name('dt_informasi.cetak_pdf');

    //CRUD Data User Petugas -------------------------------------------------------------------
    Route::resource('/dbstaf/dt_user_petugas', 'DataUserPetugasController');
    // Route::POST('dbstaf/dt_user_petugas/simpandata','DataUserPetugasController@store')->name('simpandata');
    Route::match(['get','post'], 'dbstaf/dt_user_petugas/edit/{id}','DataUserPetugasController@edit');
    Route::match(['get','post'], 'dbstaf/dt_user_petugas/ubahpw/{id}','DataUserPetugasController@ubahpw')->name('dt_user_petugas.ubahpw');
    Route::PUT('dbstaf/dt_user_petugas/ubahpw/{id}/simpan','DataUserPetugasController@ubahpassword')->name('dt_user_petugas.ubahpassword');
    Route::GET('dbstaf/dt_user_petugas/delete/{id}','DataUserPetugasController@delete');
    Route::get('/cetak_pdf/dt_user_petugas','DataUserPetugasController@cetak_pdf')->name('staf.dt_user_petugas.cetak_pdf');

    //CRUD Data User Staf -------------------------------------------------------------------
    Route::resource('/dbstaf/dt_user_staf', 'DataUserStafController');
    Route::match(['get','post'], 'dbstaf/dt_user_staf/edit/{id}','DataUserStafController@edit');
    Route::match(['get','post'], 'dbstaf/dt_user_staf/ubahpw/{id}','DataUserStafController@ubahpw')->name('dt_user_staf.ubahpw');
    Route::PUT('dbstaf/dt_user_staf/ubahpw/{id}/simpan','DataUserStafController@ubahpassword')->name('dt_user_staf.ubahpassword');
    Route::GET('dbstaf/dt_user_staf/delete/{id}','DataUserStafController@delete');
    Route::get('/cetak_pdf/dt_user_staf','DataUserStafController@cetak_pdf')->name('staf.dt_user_staf.cetak_pdf');

    //CRUD Data User Kopus -------------------------------------------------------------------
    Route::resource('/dbstaf/dt_user_kopus', 'DataUserKopusController');
    Route::match(['get','post'], 'dbstaf/dt_user_kopus/edit/{id}','DataUserKopusController@edit');
    Route::match(['get','post'], 'dbstaf/dt_user_kopus/ubahpw/{id}','DataUserKopusController@ubahpw')->name('dt_user_kopus.ubahpw');
    Route::PUT('dbstaf/dt_user_kopus/ubahpw/{id}/simpan','DataUserKopusController@ubahpassword')->name('dt_user_kopus.ubahpassword');
    Route::GET('dbstaf/dt_user_kopus/delete/{id}','DataUserKopusController@delete');
    Route::get('/cetak_pdf/dt_user_kopus','DataUserKopusController@cetak_pdf')->name('staf.dt_user_kopus.cetak_pdf');

    // Koordinator Puskeswan
    Route::resource('/dbstaf/dt_kopus', 'DataKopusController');
    Route::get('/dbstaf/dt_kopus/{id}/detail','DataKopusController@detail');
    Route::POST('/dbstaf/dt_kopus/create','DataKopusController@create')->name('staf.dt_kopus.create');
    //CRUD Data Staf -------------------------------------------------------------------
    Route::match(['get','post'], 'dbstaf/dt_kopus/edit/{id}','DataKopusController@edit');
    Route::GET('dbstaf/dt_kopus/delete/{id}','DataKopusController@delete');
    Route::get('/cetak_pdf/dt_kopus','DataKopusController@cetak_pdf')->name('dt_kopus.cetak_pdf');

    // Profil akun dan edit profil
    Route::resource('/dbstaf/dt_profil', 'ProfilController');
    Route::match(['get','post'], 'dbstaf/dt_profil/edit/{id}','ProfilController@edit');
});

// Route untuk Backend ----------------------------------------------------
Route::resource('admin', 'backend\AdminController');
Route::group(['namespace' => 'backend'], function()
{
    Route::resource('/dashboard/peternak', 'PeternakController');
    // Route::resource('/dashboard/admin', 'AdminController');
    Route::resource('/dashboard/dtdokter', 'DataDokterController');
    Route::get('/dashboard/dtdokter/{id}/detail','DataDokterController@detail');
    Route::resource('/dashboard/data_tutorial', 'DataTutorialController');
    Route::get('/dashboard/data_tutorial/{id}/detail','DataTutorialController@detail');
    Route::resource('/dashboard/data_artikel', 'DataArtikelController');
    Route::get('/dashboard/data_artikel/{id}/detail','DataArtikelController@detail');
    Route::resource('/dashboard/data_puskeswan', 'DataPuskeswanController');
    Route::get('/dashboard/data_puskeswan/{id}/detail','DataPuskeswanController@detail');
    Route::resource('/dashboard/dtpenyuluh', 'DataPenyuluhController');
    Route::get('/dashboard/dtpenyuluh/{id}/detail','DataPenyuluhController@detail');
    Route::resource('/dashboard/datapetugas', 'DataPetugasController');
    Route::resource('/dashboard/data_ks', 'DataKritikdanSaranController');
    Route::get('/dashboard/data_ks/{id}/detail','DataKritikdanSaranController@detail');
    Route::resource('/dashboard/dokumentasi', 'DokumentasiController');
    Route::resource('/dashboard/data_banner', 'DataBannerController');
    Route::resource('/dashboard/data_informasi', 'DataInformasiController');
    Route::get('/dashboard/data_informasi/{id}/detail','DataInformasiController@detail');
    Route::resource('/dashboard/data_staf', 'DataStafController');
    Route::get('/dashboard/data_staf/{id}/detail','DataStafController@detail');
    Route::resource('/dashboard/data_kopus', 'DataKopusController');
    Route::get('/dashboard/data_kopus/{id}/detail','DataKopusController@detail');
    Route::resource('/dashboard/data_dokpus', 'DataDokpusController');
    Route::get('/dashboard/data_dokpus/{id}/detail','DataDokpusController@detail');
    Route::resource('/dashboard/data_user_staf', 'DataUserStafController');
    Route::get('/dashboard/data_user_staf/{id}/detail','DataUserStafController@detail');
    Route::resource('/dashboard/data_user_peternak', 'DataUserPeternakController');
    Route::get('/dashboard/data_user_peternak/{id}/detail','DataUserPeternakController@detail');
    Route::resource('/dashboard/data_user_admin', 'DataUserAdminController');
    Route::get('/dashboard/data_user_admin/{id}/detail','DataUserAdminController@detail');
    Route::resource('/dashboard/data_user_petugas', 'DataUserPetugasController');
    Route::get('/dashboard/data_user_petugas/{id}/detail','DataUserPetugasController@detail');
    Route::resource('/dashboard/data_user_kopus', 'DataUserKopusController');
    Route::get('/dashboard/data_user_kopus/{id}/detail','DataUserKopusController@detail');


//Route Cetak PDF Data Penyuluh Backend --------------------------------------------------------------------
Route::get('cetak_pdf/dtpenyuluh','DataPenyuluhController@cetak_pdf')->name('dtpenyuluh.cetak_pdf');

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

//CRUD Data User Kopus -------------------------------------------------------------------
Route::resource('/dashboard/data_user_kopus', 'DataUserKopusController');
Route::match(['get','post'], 'dashboard/data_user_kopus/edit/{id}','DataUserKopusController@edit');
Route::match(['get','post'], 'dashboard/data_user_kopus/ubahpw/{id}','DataUserKopusController@ubahpw')->name('data_user_kopus.ubahpw');
Route::POST('dashboard/data_user_kopus/ubahpw/{id}/simpan','DataUserKopusController@ubahpassword')->name('data_user_kopus.ubahpassword');
Route::GET('dashboard/data_user_kopus/delete/{id}','DataUserKopusController@delete');
Route::get('/cetak_pdf/data_user_kopus','DataUserKopusController@cetak_pdf')->name('backend.data_user_kopus.cetak_pdf');

//CRUD Data User Peternak -------------------------------------------------------------------
Route::resource('/dashboard/data_user_peternak', 'DataUserPeternakController');
Route::match(['get','post'], 'dashboard/data_user_peternak/edit/{id}','DataUserPeternakController@edit');
Route::match(['get','post'], 'dashboard/data_user_peternak/ubahpw/{id}','DataUserPeternakController@ubahpw')->name('data_user_peternak.ubahpw');
Route::POST('dashboard/data_user_peternak/ubahpw/{id}/simpan','DataUserPeternakController@ubahpassword')->name('data_user_peternak.ubahpassword');
Route::GET('dashboard/data_user_peternak/delete/{id}','DataUserPeternakController@delete');
Route::get('/cetak_pdf/data_user_peternak','DataUserPeternakController@cetak_pdf')->name('backend.data_user_peternak.cetak_pdf');

//CRUD Data User Admin -------------------------------------------------------------------
Route::resource('/dashboard/data_user_admin', 'DataUserAdminController');
Route::match(['get','post'], 'dashboard/data_user_admin/edit/{id}','DataUserAdminController@edit');
Route::match(['get','post'], 'dashboard/data_user_admin/ubahpw/{id}','DataUserAdminController@ubahpw')->name('data_user_admin.ubahpw');
Route::POST('dashboard/data_user_admin/ubahpw/{id}/simpan','DataUserAdminController@ubahpassword')->name('data_user_admin.ubahpassword');
Route::GET('dashboard/data_user_admin/delete/{id}','DataUserAdminController@delete');
Route::get('/cetak_pdf/data_user_admin','DataUserAdminController@cetak_pdf')->name('backend.data_user_admin.cetak_pdf');

//CRUD Data User Petugas -------------------------------------------------------------------
Route::resource('/dashboard/data_user_petugas', 'DataUserPetugasController');
Route::match(['get','post'], 'dashboard/data_user_petugas/edit/{id}','DataUserPetugasController@edit');
Route::match(['get','post'], 'dashboard/data_user_petugas/ubahpw/{id}','DataUserPetugasController@ubahpw')->name('data_user_petugas.ubahpw');
Route::POST('dashboard/data_user_petugas/ubahpw/{id}/simpan','DataUserPetugasController@ubahpassword')->name('data_user_petugas.ubahpassword');
Route::GET('dashboard/data_user_petugas/delete/{id}','DataUserPetugasController@delete');
Route::get('/cetak_pdf/data_user_petugas','DataUserPetugasController@cetak_pdf')->name('backend.data_user_petugas.cetak_pdf');

//CRUD Data User Staf -------------------------------------------------------------------
Route::resource('/dashboard/data_user_staf', 'DataUserStafController');
Route::match(['get','post'], 'dashboard/data_user_staf/edit/{id}','DataUserStafController@edit');
Route::match(['get','post'], 'dashboard/data_user_staf/ubahpw/{id}','DataUserStafController@ubahpw')->name('data_user_staf.ubahpw');
Route::POST('dashboard/data_user_staf/ubahpw/{id}/simpan','DataUserStafController@ubahpassword')->name('data_user_staf.ubahpassword');
Route::GET('dashboard/data_user_staf/delete/{id}','DataUserStafController@delete');
Route::get('/cetak_pdf/data_user_staf','DataUserStafController@cetak_pdf')->name('backend.data_user_staf.cetak_pdf');

//CRUD Data Staf -------------------------------------------------------------------
Route::get('/dashboard/data_staf','DataStafController@detail');
Route::resource('/dashboard/data_staf', 'DataStafController');
Route::POST('dashboard/data_staf/simpandata','DataStafController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_staf/edit/{id}','DataStafController@edit');
Route::GET('dashboard/data_staf/delete/{id}','DataStafController@delete');
Route::get('/cetak_pdf/data_staf','DataStafController@cetak_pdf')->name('backend.data_staf.cetak_pdf');

//CRUD Data Dokpus -------------------------------------------------------------------
Route::get('/dashboard/data_dokpus','DataDokpusController@detail');
Route::resource('/dashboard/data_dokpus', 'DataDokpusController');
Route::POST('dashboard/data_dokpus/simpandata','DataDokpusController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_dokpus/edit/{id}','DataDokpusController@edit');
Route::GET('dashboard/data_dokpus/delete/{id}','DataDokpusController@delete');
Route::get('/cetak_pdf/data_dokpus','DataDokpusController@cetak_pdf')->name('backend.data_dokpus.cetak_pdf');

//CRUD Data Kopus -------------------------------------------------------------------
Route::get('/dashboard/data_kopus','DataKopusController@detail');
Route::resource('/dashboard/data_kopus', 'DataKopusController');
Route::POST('dashboard/data_kopus/simpandata','DataKopusController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_kopus/edit/{id}','DataKopusController@edit');
Route::GET('dashboard/data_kopus/delete/{id}','DataKopusController@delete');
Route::get('/cetak_pdf/data_kopus','DataKopusController@cetak_pdf')->name('backend.data_kopus.cetak_pdf');

//CRUD Data admin -------------------------------------------------------------------
// Route::POST('dashboard/admin/simpandata','AdminController@store')->name('simpandata');
// Route::match(['get','post'], 'dashboard/admin/edit/{id}','AdminController@edit');
// Route::GET('dashboard/admin/delete/{id}','AdminController@delete');
// Route::get('/cetak_pdf/admin','AdminController@cetak_pdf')->name('backend.admin.cetak_pdf');

//CRUD Data Kritik dan saran -------------------------------------------------------------------
Route::POST('dashboard/data_ks/simpandata','DataKritikdanSaranController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_ks/edit/{id}','DataKritikdanSaranController@edit');
Route::GET('dashboard/data_ks/delete/{id}','DataKritikdanSaranController@delete');
Route::get('/cetak_pdf/data_ks','DataKritikdanSaranController@cetak_pdf')->name('backend.data_ks.cetak_pdf');

//CRUD Data Informasi -------------------------------------------------------------------
Route::POST('dashboard/data_informasi/simpandata','DataInformasiController@store')->name('simpandata');
Route::match(['get','post'], 'dashboard/data_informasi/edit/{id}','DataInformasiController@edit');
Route::GET('dashboard/data_informasi/delete/{id}','DataInformasiController@delete');
Route::get('/cetak_pdf/data_informasi','DataInformasiController@cetak_pdf')->name('backend.data_informasi.cetak_pdf');


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
  //  Route::get('/penyuluh/respon-konsultasi', 'ResponKonsultasiController@index')->name('respon.index');
  //  Route::POST('/penyuluh/respon-konsultasi/kirimbalasan', 'ResponKonsultasiController@store')->name('respon.store');
  //  Route::get('/penyuluh/respon-konsultasi/{id}/detail', 'ResponKonsultasiController@detail')->name('respon.detail');
  //  Route::get('/penyuluh/respon-konsultasi/{id}/detailterkirim', 'ResponKonsultasiController@detailterkirim')->name('respon.detailterkirim');
  //  Route::get('/penyuluh/respon-konsultasi/{id}/hapusterkirim/{idk}/riwayat','ResponKonsultasiController@hapusterkirim')->name('respon.hapusterkirim');
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
Route::get('/artikel', 'frontend\ArtikelController@index');
Route::get('/artikel/cari', 'frontend\ArtikelController@cari');
Route::get('/artikel/kategori', 'frontend\ArtikelController@kategori');
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
Route::POST('/penyuluh/cari', [App\Http\Controllers\frontend\PenyuluhController::class, 'cari'])->name('penyuluh.cari');
Route::get('/penyuluh/{id}/detail', 'frontend\PenyuluhController@detail');

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
Route::resource('/profil', 'frontend\ProfilController');
Route::get('/profil', 'frontend\ProfilController@index')->name('profil.index');
// Route::get('/editprofil/{id}', 'frontend\ProfilController@edit')->name('editprofil.edit');
Route::match(['get','post'], '/profil/edit/{id}','frontend\ProfilController@edit')->name('profil.edit');
Route::PUT('/profil/{id}/update','frontend\ProfilController@update')->name('profil.update');