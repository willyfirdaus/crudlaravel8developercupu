<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;
use App\Models\Employee;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaicowo = Employee::where('jeniskelamin','cowo')->count();
    $jumlahpegawaicewe = Employee::where('jeniskelamin','cewe')->count();

    return view('welcome',compact('jumlahpegawai','jumlahpegawaicowo','jumlahpegawaicewe'));
})->middleware('auth');

Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai',[EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata',[EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');


Route::get('/delete/{id}',[EmployeeController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf',[EmployeeController::class, 'exportpdf'])->name('exportpdf');

//export PDF
Route::get('/exportexcel',[EmployeeController::class, 'exportexcel'])->name('exportexcel');


Route::post('/importexcel',[EmployeeController::class, 'importexcel'])->name('importexcel');

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');


Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




Route::get('/datareligion',[ReligionController::class, 'index'])->name('datareligion')->middleware('auth');
Route::get('/tambahagama',[ReligionController::class, 'create'])->name('tambahagama');

Route::post('/insertdatareligion',[ReligionController::class, 'store'])->name('insertdatareligion');

