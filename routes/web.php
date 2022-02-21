<?php

use App\Http\Controllers\EmployeeController;
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

Route::redirect('/','/home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(EmployeeController::class)->group(function(){
    Route::prefix('funcionarios')->group(function () {
        Route::get('/', 'index')->name('employees.index');
        Route::get('/cadastrar', 'create')->name('employees.create');
        Route::post('/cadastrar', 'store')->name('employees.store');
    });
});



Auth::routes(['register'=> false, 'reset' => false]);
