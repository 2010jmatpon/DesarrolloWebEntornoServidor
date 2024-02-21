<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primera Vista Laravel 10</title>
</head>

<body>
    <p>Home Vistas Laravel</p>

    @if ($nivel == 1)
    <p>Estoy en primer curso</p>
    @else
    <p>Estoy en segundo curso</p>
    @endif

    <table>
        <caption>Listado Clientes</caption>
        <thead>
            <th>Id</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente['id']}}</td>
                <td>{{$cliente['nombre']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @forelse ($usuarios as $usuario)
    {{print_r($usuario)}}
    @empty
    <p>Sin Usuarios</p>
    @endforelse
        

    <footer>
        <p>Autor: {{$autor}}</p>
        <p>Curso: {{$curso}}</p>
        <p>Módulo: {{$modulo or 'Base de Datos'}}</p>
        <p>Nivel: {{$nivel}}</p>
    </footer>

</body>

</html>