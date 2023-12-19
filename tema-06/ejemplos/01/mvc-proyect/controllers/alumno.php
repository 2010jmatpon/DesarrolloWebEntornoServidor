<?php
    // Todos los controladores se crean a partir del controlador
    class Alumno Extends Controller {

        function __construct() {
            
            parent ::__construct();
            
            
        }
        // Render se ejecuta por defecto, es decir, se ejecuta cuando en la URL no hay un segundo parametro
        function render() {
            //
            $this->view->title = "Home - Panel de control Alumnos";

            // Creo la propiedad alumnos dentro de la vista del modelo asignado al controlador, y ejecuto el modelo get(); 
            $this->view->alumnos = $this->model->get();
            
            // Cargara la vista alumno
            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * Creamos un nuevo alumno
         */
        function new(){
            // Etiqueta titulo
            $this->view->title = "Añadir - Gestión Alumnos";

            // Obtenemos los cursos para la lista dinamica
            $this->view->cursos = $this->model->getCursos();

            // Cargamos la vista con el formulario
            $this->view->render('alumno/new/index');
        }

        /**
         * Método create
         * Introducimos un nuevo alumno a la base de datos
         */
        function create($param = []){
            // Cargamos los datos del formulario
            $alumno = new classAlumno(
                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                null,
                null,
                $_POST['poblacion'],
                null,
                null,
                $_POST['dni'],
                $_POST['fechaNac'],
                $_POST['id_curso'],
            );

            #Validación

            #Añadir registro a la tabla
            $this->model->create($alumno);

            #Redirigimos al main alumnos
            header('location:'.URL.'alumno');
        }

        /**
         * Método show
         * Muestra los detalles de un registro
         */
        function show($param = []){

        }

        
    }

?>