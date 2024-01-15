<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        #inicio o continuo sesion
        session_start();

        #comprobar si existe mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }
        # Creo la propiedad title de la vista
        $this->view->title = "Home - Panel Control Alumnos";

        # Creo la propiedad alumnos dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->alumnos = $this->model->get();

        $this->view->render('alumno/main/index');
    }

    function new()
    {
        # Continuamos la sesion
        session_start();

        # Creamos un objeto vacio
        $this->view->alumno = new classAlumno();

        # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
        if (isset($_SESSION['error'])) {
            // rescatemos el mensaje
            $this->view->error = $_SESSION['error'];

            // Autorellenamos el formulario
            $this->view->alumno = unserialize($_SESSION['alumno']);

            // Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['alumnos']);
            // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
        }

        # etiqueta title de la vista
        $this->view->title = "Añadir - Gestión Alumnos";

        #  obtener los cursos  para generar dinámicamente lista cursos
        $this->view->cursos = $this->model->getCursos();

        # cargo la vista con el formulario nuevo alumno
        $this->view->render('alumno/new/index');
    }

    function create($param = [])
    {
        
        #Iniciar Sesión
        session_start();

        #1.Seguridad. Saneamos los datos del formulario
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

        #2. Creamos alumno con los datos saneados
        $alumno = new classAlumno(
            null,
            $nombre,
            $apellidos,
            $email,
            $telefono,
            null,
            $poblacion,
            null,
            null,
            $dni,
            $fechaNac,
            $id_curso
        );

        #3.Validacion
        $errores = [];

        //Nombre: obligatorio
        if (empty($nombre)) {
            $errores['nombre'] = 'El campo nombre es obligatorio';
        }

        //Apellidos: obligatorio
        if (empty($apellidos)) {
            $errores['apellidos'] = 'El campo apellidos es obligatorio';
        }

        //Fecha Nacimiento: obligatorio
        // $valores = explode('/', $fechaNac);
        // if (empty($fechaNac)){
        //     $errores['fechaNac']= 'El campo fecha nacimiento es obligatorio';
        // } else if (!checkdate($valores[1], $valores[0], $valores[2])){
        //     $errores['fechaNac']= 'Fecha no valida';
        // }

        //Email: obligatorio, formato válido y clave secundaria
        if (empty($email)) {
            $errores['email'] = 'El campo email es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El formato introducido es incorrecto';
        } else if (!$this->model->validateUniqueEmail($email)) {
            $errores['email'] = 'Email ya registrado';

        }

        //Dni: obligatorio, formato válido y clave secundaria
        $options = [
            'options' => [
                'regexp' => '/^(\d{8})([A-Z])$/'
            ]
        ];

        if (empty($dni)) {
            $errores['dni'] = 'El campo dni es obligatorio';
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
            $errores['dni'] = 'El formato introducido es incorrecto';
        } else if (!$this->model->validateUniqueDni($dni)) {
            $errores['dni'] = 'Dni ya registrado';

        }

        //id_curso: obligatorio, entero, existente
        if (empty($id_curso)) {
            $errores['id_curso'] = 'El campo id_curso es obligatorio';
        } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
            $errores['id_curso'] = 'El formato introducido es incorrecto';
        } else if (!$this->model->validateCurso($id_curso)) {
            $errores['id_curso'] = 'Curso no existente';

        }

        #4. Comprobar validacion

        if (!empty($errores)) {
            //errores de validacion
            $_SESSION['alumno'] = serialize($alumno);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            header('location:' . URL . 'alumno/new');

        } else {
            //crear alumno
            # Añadir registro a la tabla
            $this->model->create($alumno);

            #Mensaje
            $_SESSION['mensaje'] = "Alumno creado correctamente";

            # Redirigimos al main de alumnos
            header('location:' . URL . 'alumno');
        }

        ####################################################################################################
####################################################################################################
    }

    function edit($param = [])
    {

        # Continuamos la sesion
        session_start();

        # obtengo el id del alumno que voy a editar
        // alumno/edit/4

        $id = $param[0];

        # asigno id a una propiedad de la vista
        $this->view->id = $id;

        # title
        $this->view->title = "Editar - Panel de control Alumnos";

        # obtener objeto de la clase alumno
        $this->view->alumno = $this->model->read($id);

        # obtener los cursos
        $this->view->cursos = $this->model->getCursos();


        # Creamos un objeto vacio
        $this->view->alumno = new classAlumno();

        # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
        if (isset($_SESSION['error'])) {
            // rescatemos el mensaje
            $this->view->error = $_SESSION['error'];

            // Autorellenamos el formulario
            $this->view->alumno = unserialize($_SESSION['alumno']);

            // Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['alumnos']);
            // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
        }

        # cargo la vista
        $this->view->render('alumno/edit/index');



    }

    public function update($param = [])
    {

        #Iniciar Sesión
        session_start();

        #1.Seguridad. Saneamos los datos del formulario
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);

        #2. Creamos alumno con los datos saneados
        $alumno = new classAlumno(
            null,
            $nombre,
            $apellidos,
            $email,
            $telefono,
            null,
            $poblacion,
            null,
            null,
            $dni,
            $fechaNac,
            $id_curso
        );

        # Cargo id del alumno
        $id = $param[0];

        #Obtengo el objeto alumno original
        $alumno_orig = $this->model->read($id);

        #3. Validación
        //Sólo si es necesario
        //Sólo en caso de modificación del campo

        $errores = [];

        //Validar nombre
        if (strcmp($alumno->nombre, $alumno_orig->nombre) !== 0) {
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }
        }

        //Apellidos: obligatorio
        if (strcmp($alumno->apellidos, $alumno_orig->apellidos) !== 0) {

            if (empty($apellidos)) {
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            }
        }

        //Fecha Nacimiento: obligatorio
        // $valores = explode('/', $fechaNac);
        // if (empty($fechaNac)){
        //     $errores['fechaNac']= 'El campo fecha nacimiento es obligatorio';
        // } else if (!checkdate($valores[1], $valores[0], $valores[2])){
        //     $errores['fechaNac']= 'Fecha no valida';
        // }

        //Email: obligatorio, formato válido y clave secundaria
        if (strcmp($alumno->email, $alumno_orig->email) !== 0) {

            if (empty($email)) {
                $errores['email'] = 'El campo email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'El formato introducido es incorrecto';
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = 'Email ya registrado';

            }
        }
        //Dni: obligatorio, formato válido y clave secundaria
        $options = [
            'options' => [
                'regexp' => '/^(\d{8})([A-Z])$/'
            ]
        ];
        if (strcmp($alumno->dni, $alumno_orig->dni) !== 0) {

            if (empty($dni)) {
                $errores['dni'] = 'El campo dni es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                $errores['dni'] = 'El formato introducido es incorrecto';
            } else if (!$this->model->validateUniqueDni($dni)) {
                $errores['dni'] = 'Dni ya registrado';

            }
        }

        //id_curso: obligatorio, entero, existente
        if (strcmp($alumno->id_curso, $alumno_orig->id_curso) !== 0) {

            if (empty($id_curso)) {
                $errores['id_curso'] = 'El campo id_curso es obligatorio';
            } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
                $errores['id_curso'] = 'El formato introducido es incorrecto';
            } else if (!$this->model->validateCurso($id_curso)) {
                $errores['id_curso'] = 'Curso no existente';

            }
        }

        #4. Comprobar validacion

        if (!empty($errores)) {
            //errores de validacion
            $_SESSION['alumno'] = serialize($alumno);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            # Redirigimos al main de alumnos
            header('location:' . URL . 'alumno/edit/' . $id);
        } else {
            //crear alumno
            # Añadir registro a la tabla
            $this->model->create($alumno);

            #Mensaje
            $_SESSION['mensaje'] = "Alumno creado correctamente";

            # Redirigimos al main de alumnos
            header('location:' . URL . 'alumno');
        }

        ####################################################################################################
####################################################################################################

        # Con los detalles formulario creo objeto alumno
        $alumno = new classAlumno(

            null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['email'],
            $_POST['telefono'],
            null,
            $_POST['poblacion'],
            null,
            null,
            $_POST['dni'],
            $_POST['fechaNac'],
            $_POST['id_curso']

        );

        # Actualizo base  de datos
        $this->model->update($alumno, $id);

        # Cargo el controlador principal de alumno
        header('location:' . URL . 'alumno');

    }

    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad title de la vista
        $this->view->title = "Ordenar - Panel Control Alumnos";

        # Creo la propiedad alumnos dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->alumnos = $this->model->order($criterio);

        # Cargo la vista principal de alumno
        $this->view->render('alumno/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo expresión de búsqueda
        $expresion = $_GET['expresion'];

        # Creo la propiedad title de la vista
        $this->view->title = "Buscar - Panel Control Alumnos";

        # Filtro a partir de la  expresión
        $this->view->alumnos = $this->model->filter($expresion);

        # Cargo la vista principal de alumno
        $this->view->render('alumno/main/index');
    }
}

?>