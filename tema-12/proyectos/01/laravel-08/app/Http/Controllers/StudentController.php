<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Muestra los alumnos
        $alumnos = Student::all()->sortBy('id');
        return view('student.home', ['alumnos' => $alumnos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Carga formulario nuevo alumno
        $cursos = Course::all()->sortBy('course');
        return view('student.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recibe los datos del formulario
        //Valida los datos
        //Almacena en la tabla student de la base de datos

        //Validación Formulario
        //Especifico en un array las reglas de validación de cada campo
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:35'],
                'lastname' => ['required', 'string', 'max:50'],
                'birth_date' => ['required', 'date'],
                'phone' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', 'unique:students'],
                'email' => ['required', 'string', 'max:40', 'unique:students'],
                'course_id' => ['required', 'exists:courses,id'],
            ]
        );
        //Cargamos los datos del formulario en la tabla courses
        $alumno = Student::create(
            [
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'birth_date' => $request['birth_date'],
                'phone' => $request['phone'],
                'city' => $request['city'],
                'dni' => $request['dni'],
                'email' => $request['email'],
                'course_id' => $request['course_id'],
            ]
        );
        $alumno->save();
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
