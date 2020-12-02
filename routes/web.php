<?php

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
    return redirect()->route('login');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('Admin.home');
Route::get('/mahasiswa', 'MahasiswaController@index')->name('Mahasiswa.home');
Route::get('/dosen', 'DosenController@index')->name('Dosen.home');

Route::resource('user', 'UserController');
Route::get('dataTableUSer', 'UserController@dataTable')->name('dataTableUser');

//Route By Ciwi Ciwi
Route::get('/mahasiswa/list/{id}/tambah','MahasiswaController@tambah')->name('tambahjudul');
Route::post('/mahasiswa/list{id}/update1','MahasiswaController@store')->name('updatejudul1');

Route::get('/mahasiswa/upload','MahasiswaController@upload')->name('mahasiswa.upload');
Route::get('/mahasiswa/upload/{id}','MahasiswaController@supload')->name('mahasiswa.supload');
Route::post('/mahasiswa/upload/{id}','MahasiswaController@suploads')->name('mahasiswa.suploads');

Route::get('/mahasiswa/detail/{id}', 'MahasiswaController@detail')->name('detail');
Route::get('mahasiswa/detail/{id}/edit','MahasiswaController@edit')->name('edit');
Route::post('/mahasiswa/detail/{id}/update', 'MahasiswaController@update')->name('update');
Route::get('/mahasiswa/list','MahasiswaController@list')->name('list');
Route::get('/mahasiswa/tambahdosbing/{id}', 'MahasiswaController@tambahdosbing')->name('tdos');
Route::get('/mahasiswa/tambahide', 'MahasiswaController@pilihdosbing')->name('dosbing');
Route::post('/mahasiswa/storeide','MahasiswaController@storeide')->name('storeide');
Route::post('/mahasiswa/storedos/{id}','MahasiswaController@storedos')->name('storedos');

// Route By Fandy

Route::get('/logina', function(){
    return view('login.login');
})->name('login');


Route::post('/masuk', 'loginController@login')->name('masuk');
Route::get('/keluar', 'loginController@logout')->name('keluar');
Route::get('/dosen/terima/{id}', 'dosenController@terima')->name('terima');
Route::get('/dosen/grup', 'dosenController@grup')->name('dosen.grup');
Route::get('/dosen/tolak/{id}', 'dosenController@tolak')->name('tolak');
Route::post('/dosen/tolak/{id}/tolaks', 'dosenController@tolaks')->name('tolaks');


//Fandy 2

Route::resource('dosen/judul', 'dosen\judulController');
Route::post('dosen/judul/{id}/updates', 'dosen\judulController@updates')->name('judul.updates');
Route::get('dosen/judul/{id}/updatess', 'dosen\judulController@updatess')->name('judul.updatess');


Route::get('/admin/dosbing', 'AdminController@dosbing')->name('admin.dosbing');
Route::get('/admin/dosbing/store/{id}', 'AdminController@dosbing_store')->name('admin.dosbing.store');
Route::get('/admin/kelompok', 'AdminController@kelompok')->name('admin.kelompok');
Route::get('/admin/kelompok/{id}', 'AdminController@kelompok_show')->name('admin.kelompok.show');
Route::get('/admin/permohonan/', 'AdminController@permohonan')->name('admin.permohonan');
Route::get('/admin/permohonan/{id}', 'AdminController@permohonan_show')->name('admin.permohonan.show');
Route::get('/admin/permohonan/store/{id}', 'AdminController@permohonan_store')->name('admin.permohonan.store');


//

