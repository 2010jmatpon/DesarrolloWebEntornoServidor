<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/cuentas", [AccountController::class, 'index'])->name('cuentas.index');
Route::get("/cuentas/create", [AccountController::class, 'create'])->name('cuentas.create');
Route::get("/cuentas/store", [AccountController::class, 'store'])->name('cuentas.store');
Route::get("/cuentas/show/{id}", [AccountController::class, 'show'])->name('cuentas.show');
Route::get("/cuentas/edit/{id}", [AccountController::class, 'edit'])->name('cuentas.edit');
Route::get("/cuentas/update/{id}", [AccountController::class, 'update'])->name('cuentas.update');
Route::get("/cuentas/destroy/{id}", [AccountController::class, 'destroy'])->name('cuentas.destroy');
