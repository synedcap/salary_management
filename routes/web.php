<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\TreatmentSalaryController;

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


Route::get('/',function(){
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/countries',  [CountryController::class, 'index'])->name('countries.index');
Route::post('countries',  [CountryController::class, 'store'])->name('countries.store');
Route::post('/countries/{country}/delete',[CountryController::class, 'destroy'])->name('countries.destroy');
Route::post('/countries/{country}/edit', [CountryController::class, 'update'])->name('countries.update');

//Route::get('/employee',  [CountryController::class, 'index'])->name('employee.index');
Route::post('/employees',  [EmployeController::class, 'store'])->name('employee.store');
Route::post('/employees/{employe}/delete',[EmployeController::class, 'destroy'])->name('employee.destroy');
Route::post('/employees/{employe}/edit', [EmployeController::class, 'update'])->name('employee.update');

Route::get('/treatment',  [TreatmentSalaryController::class, 'index'])->name('treatment.index');
Route::post('/treatment',  [TreatmentSalaryController::class, 'store'])->name('treatment.store');
Route::get('/salary-pay/{treatment}',  [TreatmentSalaryController::class, 'salaryPay'])->name('salary-pay');
Route::post('/employee-info',  [TreatmentSalaryController::class, 'employeeInfo'])->name('employee-info');
Route::get('/loan',  [LoanController::class, 'index'])->name('loan.index');
Route::post('/loan',  [LoanController::class, 'store'])->name('loan.store');
Route::get('/payement-detail/{id}',  [LoanController::class, 'detailPayement'])->name('detailPayement');

Route::get('/stat',  [StatController::class, 'index'])->name('stat.index');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');
