<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route Api Login dan Register
Route::post('api_users/login/peternak','ApiUsersController@loginUser');
Route::post('api_users/register/peternak','ApiUsersController@registerUser');

//Route Api update Profile
Route::put('api_users/{id}/updatepeternak','ApiUsersController@updateProfile');

//Route Api Users
Route::get('api_users', 'ApiUsersController@getAll');
Route::get('api_users/{id}', 'ApiUsersController@getUsers');
Route::post('api_users', 'ApiUsersController@createUsers');
Route::put('api_users/{id}', 'ApiUsersController@updateUsers');
Route::delete('api_users/{id}', 'ApiUsersController@deleteUsers');

//Route Api Petugas
Route::get('api_petugas', 'ApiPetugasController@getAll');
Route::get('api_petugas/{id}', 'ApiPetugasController@getPetugas');
Route::post('api_petugas', 'ApiPetugasController@createPetugas');
Route::put('api_petugas/{id}', 'ApiPetugasController@updatePetugas');
Route::delete('api_petugas/{id}', 'ApiPetugasController@deletePetugas');
Route::get('api_petugas/cari/petugas', 'ApiPetugasController@cariPetugas');
Route::get('api_petugas/kategori/petugas', 'ApiPetugasController@kategoriPetugas');
Route::get('api_petugas/terdekat/petugas', 'ApiPetugasController@terdekatPetugas');

//Route Api Artikel
Route::get('api_artikel', 'ApiArtikelController@getAll');
Route::get('api_artikel/{id_artikel}', 'ApiArtikelController@getArtikel');
Route::post('api_artikel', 'ApiArtikelController@createArtikel');
Route::put('api_artikel/{id}', 'ApiArtikelController@updateArtikel');
Route::delete('api_artikel/{id}', 'ApiArtikelController@deleteArtikel');
Route::get('api_artikel/cari/artikel', 'ApiArtikelController@cariArtikel');
Route::get('api_artikel/kategori/artikel', 'ApiArtikelController@kategoriArtikel');

//Route Api Puskeswan
Route::get('api_puskeswan', 'ApiPuskeswanController@getAll');
Route::get('api_puskeswan/{id_puskeswan}', 'ApiPuskeswanController@getPuskeswan');
Route::post('api_puskeswan', 'ApiPuskeswanController@createPuskeswan');
Route::put('api_puskeswan/{id_puskeswan}', 'ApiPuskeswanController@updatePuskeswan');
Route::delete('api_puskeswan/{id_puskeswan}', 'ApiPuskeswanController@deletePuskeswan');

//Route Api Tutorial
Route::get('api_tutorial', 'ApiTutorialController@getAll');
Route::get('api_tutorial/{id_tutorial}', 'ApiTutorialController@getTutorial');
Route::post('api_tutorial', 'ApiTutorialController@createTutorial');
Route::put('api_tutorial/{id_tutorial}', 'ApiTutorialController@updateTutorial');
Route::delete('api_tutorial/{id_tutorial}', 'ApiTutorialController@deleteTutorial');

//Route Api Kritik dan saran
Route::get('api_kritikdansaran', 'ApiKritikdanSaranController@getAll');
Route::get('api_kritikdansaran/{id_ks}', 'ApiKritikdanSaranController@getKs');
Route::post('api_kritikdansaran', 'ApiKritikdanSaranController@createKs');
Route::put('api_kritikdansaran/{id_ks}', 'ApiKritikdanSaranController@updateKs');
Route::delete('api_kritikdansaran/{id_ks}', 'ApiKritikdanSaranController@deleteKs');

//Route Api Banner
Route::get('api_banner', 'ApiBannerController@getAll');
Route::get('api_banner/{id_banner}', 'ApiBannerController@getBn');
Route::post('api_banner', 'ApiBannerController@createBn');
Route::put('api_banner/{id_banner}', 'ApiBannerController@updateBn');
Route::delete('api_banner/{id_banner}', 'ApiBannerController@deleteBn');

//Route Api Dokumentasi
Route::get('api_dokumentasi', 'ApiDokumentasiController@getAll');
Route::get('api_dokumentasi/{id_dokumentasi}', 'ApiDokumentasiController@getDokumentasi');
Route::post('api_dokumentasi', 'ApiDokumentasiController@createDokumentasi');
Route::put('api_dokumentasi/{id_dokumentasi}', 'ApiDokumentasiController@updateDokumentasi');
Route::delete('api_dokumentasi/{id_dokumentasi}', 'ApiDokumentasiController@deleteDokumentasi');

//Route Api Konsultasi
Route::get('api_konsultasi/konsultasiterkirim/{id}', 'ApiKonsultasiController@getTerkirim');
// Route::get('api_konsultasi/{id_peternak}/detailterkirim/{id}', 'ApiKonsultasiController@getDetailTerkirim');
Route::get('api_konsultasi/konsultasimasuk/{id}', 'ApiKonsultasiController@getMasuk');
// Route::get('api_konsultasi/{id_peternak}/detailmasuk/{id}', 'ApiKonsultasiController@getDetailMasuk');
Route::post('api_konsultasi', 'ApiKonsultasiController@tulisKonsultasi');
Route::delete('api_konsultasi/{id_konsultasi}/hapusterkirim', 'ApiKonsultasiController@deleteKonsultasi');
Route::delete('api_konsultasi/{id_konsultasi}/hapusmasuk', 'ApiKonsultasiController@hapusMasuk');

// Route::get('api_konsultasi/konsultasiterkirim', 'ApiKonsultasiController@getTerkirim');
Route::get('api_konsultasi/detailterkirim/{id_konsultasi}', 'ApiKonsultasiController@getDetailTerkirim');
// Route::get('api_konsultasi/konsultasimasuk', 'ApiKonsultasiController@getMasuk');
Route::get('api_konsultasi/detailmasuk/{id_riwayat}', 'ApiKonsultasiController@getDetailMasuk');


//Route Api Jenis Hewan
Route::get('api_kategori', 'ApiJenisHewanController@getAll');
Route::get('api_kategori/kategori/cari', 'ApiJenisHewanController@cariKategori');

