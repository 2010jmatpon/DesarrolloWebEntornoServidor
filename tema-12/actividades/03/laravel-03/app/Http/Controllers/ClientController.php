<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Mostrar todos los clientes

    public function index()
    {
        return "Lista Clientes";
    }

    public function create()
    {
        return "Nuevo Cliente";
    }

    public function update($id)
    {
        return "Editar Cliente ($id)";
    }
    
    public function delete($id)
    {
        return "Eliminar Cliente ($id)";
    }

    public function show($id)
    {
        return "Mostrar Cliente: ($id)";
    }


}
