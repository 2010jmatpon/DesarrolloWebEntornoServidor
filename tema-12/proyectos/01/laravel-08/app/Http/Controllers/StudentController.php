<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $cursos = Course::pluck('course', 'id');

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
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('course');
        return view('student.show', ['alumno' => $alumno, 'cursos' => $cursos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Cargo los datos del alumno
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('course');
        return view('student.edit', ['alumno' => $alumno, 'cursos' => $cursos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:35'],
                'lastname' => ['required', 'string', 'max:50'],
                'birth_date' => ['required', 'date'],
                'phone' => ['required', 'max:13'],
                'city' => ['required', 'string', 'max:40'],
                'dni' => ['required', 'string', 'max:9', Rule::unique('students')->ignore($id)],
                'email' => ['required', 'string', 'max:40', Rule::unique('students')->ignore($id)],
                'course_id' => ['required', 'exists:courses,id'],
            ]
        );

        $alumno = Student::find($id);
        $alumno->name = $request['name'];
        $alumno->lastname = $request['lastname'];
        $alumno->birth_date = $request['birth_date'];
        $alumno->phone = $request['phone'];
        $alumno->city = $request['city'];
        $alumno->dni = $request['dni'];
        $alumno->email = $request['email'];
        $alumno->course_id = $request['course_id'];

        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'Alumno editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Student::destroy($id);
        // $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');


    }
}
