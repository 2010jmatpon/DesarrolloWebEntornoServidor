<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $autor = 'Juan M';
        $curso = '23/24';
        $modulo = null;
        $nivel = 2;

        $clientes = [
            [
                'id' => 1,
                'nombre' => 'Paquito'
            ],
            [
                'id' => 2,
                'nombre' => 'Paquito2'
            ],
            [
                'id' => 3,
                'nombre' => 'Paquito3'
            ],
            [
                'id' => 4,
                'nombre' => 'Pedrito'
            ]
        ];
        $usuarios = [];
        return view('home.index', compact('autor', 'curso', 'modulo', 'nivel', 'clientes', 'usuarios'));
    }
}
