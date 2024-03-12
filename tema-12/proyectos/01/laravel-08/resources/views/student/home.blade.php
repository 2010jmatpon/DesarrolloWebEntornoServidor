{{-- Creates una vista a partir del layout
Vista principal Alumnos --}}

@extends('layouts.layout')

@section('titulo', 'Home Alumnos')
@section('subtitulo', 'Panel Control Alumnos')

@section('contenido')
{{-- Menu alumnos --}}
    @include('student.partials.menu')
    @include('student.partials.alert')
    
    {{-- Lista de alumnos --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
            <tr>
                {{-- registro alumno --}}
                <td scope="row">{{$alumno->id}}</td>
                <td>{{$alumno->lastname}}</td>
                <td>{{$alumno->name}}</td>
                <td>{{$alumno->phone}}</td>
                <td>{{$alumno->city}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{$alumno->course->course}}</td>

                {{-- botones de accion --}}
                <td style="display:flex; justify-content:space-between;">
                    <a href="#" title="Editar" class="btn btn-primary"> <i class="bi bi-pencil"></i> </a>
                    <a href="#" title="Mostrar" class="btn btn-warning"> <i class="bi bi-eye"></i> </a>
                    <a href="#" title="Eliminar" onclick="return confirm('Confirmar eliminación Cuenta') " class="btn btn-danger"> <i class="bi bi-trash"></i> </a>
                </td>
            </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
    <br><br><br>
@endsection