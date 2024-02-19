<?php

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

Route::get('/test', function () {
    return "Juan María, Desarrollo Web Entorno Cliente, 2DAW, Prueba";
});

Route::get('/api/user', function () {
    return "No temo a los ordenadores; lo que temo es quedarme sin ellos";
});

Route::get('/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "Hola soy {$nombre} {$apellidos}";
});

Route::get('/user/view/{id?}', function ($id = null) {
    if (!$id) {
        return "Ningún usuario seleccionado";

    } else {
        return "View: {$id}";

    }
});

Route::get('/players/select/{id1}/{id2?}', function ($id1, $id2 = null) {
    if (!$id2) {
        return "Seleccionar Jugador: " . $id1;
    } else {
        return "Seleccionar jugadores desde el: {$id1} hasta el {$id2}";
    }
});