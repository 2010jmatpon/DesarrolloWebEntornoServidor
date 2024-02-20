<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return "Lista de Cuentas";
    }

    
    public function create()
    {
        return "Crear Cuenta";

    }

 
    public function store()
    {
        return "Lista de Cuentas";

    }

  
    public function show(string $id)
    {
        return "Almacenar Cuenta {$id}";

    }

    
    public function edit(string $id)
    {
        return "Editar Cuenta {$id}";

    }

   
    public function update(string $id)
    {
        return "Actualizar Cuenta {$id}";
 
    }

    public function destroy(string $id)
    {
        return "Eliminar Cuenta {$id}";

    }
}
