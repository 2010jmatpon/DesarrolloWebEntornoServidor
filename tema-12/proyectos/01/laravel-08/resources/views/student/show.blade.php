@extends('layouts.layout')

@section('titulo', 'Alumnos')
@section('subtitulo', 'Añadir Nuevo Cliente')
@section('contenido')

    <div class="card">
        <div class="card-header">
            Mostrar Alumno
        </div>
        @include('student.partials.alert')

        <div class="card-body">
            <!-- Formulario  -->

            <form method="POST">
                @csrf
                @method('PUT')
                <!-- Nombre  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $alumno->name) }}" required
                        autocomplete="name" autofocus disabled>
                </div>

                <!-- Apellidos  -->
                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="lastname"
                        value="{{ old('lastname', $alumno->lastname) }}" required autocomplete="lastname" autofocus
                        disabled>
                </div>

                <!-- Birth Date  -->
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" name="birth_date"
                        value="{{ old('birth_date', $alumno->birth_date) }}" required autocomplete="birth_date" autofocus
                        disabled>
                </div>

                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control" name="dni" value="{{ old('dni', $alumno->dni) }}"
                        required autocomplete="nombre" autofocus disabled>

                </div>

                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $alumno->email) }}"
                        required autocomplete="email" autofocus disabled>
                </div>

                <!-- Phone  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" name="phone" value="{{ old('phone', $alumno->phone) }}"
                        required autocomplete="phone" autofocus disabled>
                </div>
                <!-- Ciudad  -->
                <div class="mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $alumno->city) }}"
                        required autocomplete="city" autofocus disabled>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Curso</label>
                    <input type="text" class="form-control" name="course"
                        value="{{old('course_id', $alumno->course->course) }} " required autocomplete="course"
                        autofocus disabled>
                    {{-- <select class="form-select" aria-label="Default select example" name="course_id" disabled>
                        <option selected disabled>Seleccione Curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" @if ($curso->id == old('course_id', $alumno->course_id)) selected @endif>
                                {{ $curso->course }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>


        </div>
        {{-- Fin Formulario --}}



        <div class="card-footer text-muted">
            <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-secondary" href="{{ route('alumnos.index') }}" role="button">Cancelar</a>
        </div>

        </form>
    </div>
    <br><br><br>


@endsection
