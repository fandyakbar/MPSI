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
    return view('welcome');
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
Route::get('/mahasiswa/detail/{id}', 'MahasiswaController@detail')->name('detail');
Route::get('mahasiswa/detail/{id}/edit','MahasiswaController@edit')->name('edit');
Route::post('/mahasiswa/detail/{id}/update', 'MahasiswaController@update')->name('update');
Route::get('/mahasiswa/list','MahasiswaController@list')->name('list');
Route::get('/mahasiswa/tambahide', 'MahasiswaController@tambahide')->name('bidang');
Route::get('/mahasiswa/tambahide/{id}', 'MahasiswaController@pilihdosbing')->name('dosbing');
Route::post('/mahasiswa/storeide','MahasiswaController@storeide')->name('storeide');

// Route By Fandy

Route::get('/logina', function(){
    return view('login.login');
})->name('login');
Route::post('/masuk', 'loginController@login')->name('masuk');
Route::get('/keluar', 'loginController@logout')->name('keluar');
Route::get('/dosen/terima/{id}', 'dosenController@terima')->name('terima');
Route::get('/dosen/tolak/{id}', 'dosenController@tolak')->name('tolak');
Route::post('/dosen/tolak/{id}/tolaks', 'dosenController@tolaks')->name('tolaks');


//

