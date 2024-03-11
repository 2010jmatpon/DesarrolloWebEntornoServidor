<?php

class Users extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        #inicio o continuo sesion
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['main']))) {
            $_SESSION['mensaje'] = "Usuario sin autentificar";
            header("location:" . URL . "index");

        } else {
            #comprobar si existe mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);

            }


            $this->view->title = "Tabla Usuarios";
            $this->view->users = $this->model->get();
            $this->view->render("users/main/index");
        }
    }

    public function nuevo($param = [])
    {
        # Continuamos la sesion
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {

            # Creamos un objeto vacio
            $this->view->user = new classUser();

            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->user = unserialize($_SESSION['user']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['users']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            $this->view->title = "Formulario Usuario nuevo";
            $this->view->users = $this->model->getRoles();
            $this->view->render("users/nuevo/index");
        }
    }

    function create($param = [])
    {
        #Iniciar Sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {

            $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $password_confirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_SPECIAL_CHARS);
            $rol = filter_var($_POST['rol'], FILTER_SANITIZE_SPECIAL_CHARS);

            # Validaciones
            $user = new classUser(
                null,
                $name,
                $email,
                $password,
                $password_confirm,
                $rol
            );
            $errores = [];

            # Validar name
            if (empty($name)) {
                $errores['name'] = "Campo obligatiorio";
            } else if (!$this->model->validaName($name)) {
                $errores['name'] = "Nombre de usuario no permitido";
            }

            // # Validar Email
            if (empty($email)) {
                $errores['email'] = "Campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Email: Email no válido";
            } else if (!$this->model->validateEmailUnique($email)) {
                $errores['email'] = "Email ya registrado";
            }

            # Validar password
            if (empty($password)) {
                $errores['password'] = "No se ha introducido una contraseña";
            } else if (strcmp($password, $password_confirm) !== 0) {
                $errores['password'] = "Password no coincidentes";
            } elseif (!$this->model->validatePass($password)) {
                $errores['password'] = "Password: No permitido";
            }

            if (empty($rol)) {
                $errores['rol'] = "Campo obligatiorio";
            }

            if (!empty($errores)) {
                $_SESSION['user'] = serialize($user);

                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['rol'] = $rol;
                $_SESSION['error'] = "Fallo en la validación del formulario";
                $_SESSION['errores'] = $errores;

                header("location:" . URL . "users/nuevo");

            } else {

                # Añade nuevo usuario

                $this->model->create($name, $email, $password, $rol);
                $_SESSION['mensaje'] = "Usuario creado correctamente";
                #Vuelve login
                header("location:" . URL . "users");
                exit();
            }

        }
    }

    public function delete($param = [])
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            # Capa autentificación
            if (!isset($_SESSION['id'])) {

                header("location:" . URL . "users");

            } else {

                $id = $param[0];

                # Elimino perfil de usuario
                $this->model->delete($id);

                # Salgo de la aplicación
                header('location:' . URL . 'users');
            }
        }



    }
    public function edit($param = [])
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            # Capa autentificación
            if (!isset($_SESSION['id'])) {

                header("location:" . URL . "users");

            }
            # Comprobamos si existe mensaje
            if (isset($_SESSION['mensaje'])) {

                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);

            }

            $id = $param[0];

            $this->view->id = $id;
            # Obtenemos objeto User con los detalles del usuario
            $this->view->users = $this->model->getUserId($id);
            $this->view->roles = $this->model->getRoles();


            # Capa no validación formulario
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];
                unset($_SESSION['error']);

                unset($_SESSION['users']);

                # Tipo de error
                $this->view->errores = $_SESSION['errores'];
                unset($_SESSION['errores']);

            }

            $this->view->title = 'Modificar Perfil Usuario - Gesbank';
            $this->view->render('users/editar/index');

        }

    }

    public function update($param = [])
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            $id = $param[0];
            # Obtenemos objeto con los detalles del usuario
            $user_orig = $this->model->getUserId($id);
            # Saneamos el formulario
            $name = filter_var($_POST['name'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= null, FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
            $password_confirm = filter_var($_POST['password_confirm'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
            $rol = filter_var($_POST['rol'], FILTER_SANITIZE_SPECIAL_CHARS);


            # Validaciones
            $errores = [];
            # Crear objeto user

            // name

            if (empty($name)) {
                $errores['name'] = "Nombre de usuario es obligatorio";
            } else if ((strlen($name) < 5) || (strlen($name) > 50)) {
                $errores['name'] = "Nombre de usuario ha de tener entre 5 y 50 caracteres";
            }


            // email

            if (empty($email)) {
                $errores['email'] = "Email es un campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Email no válido";
            }



            if (empty($rol)) {
                $errores['rol'] = "Campo obligatiorio";
            }

            if (empty($password)) {
                $errores['password'] = "Password no introducido";
            } else if (strcmp($password, $password_confirm) !== 0) {
                $errores['password'] = "Password no coincidentes";
            } else if ((strlen($password) < 5) || (strlen($password) > 60)) {
                $errores['password'] = "Password ha de tener entre 5 y 60 caracteres";
            }

            # Comprobamos si hay errores
            if (!empty($errores)) {

                $_SESSION['user'] = serialize($user_orig);
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['rol'] = $rol;
                $_SESSION['error'] = "Formulario con errores de validación";
                $_SESSION['errores'] = $errores;
                header('location:' . URL . 'users/editar');

            }

            if (!empty($password)) {
                $passwd = password_hash($password, CRYPT_BLOWFISH);
            } else {
                $passwd = $user_orig->password;
            }
            $user = new classUser(
                null,
                $name,
                $email,
                $passwd,
                $rol
            );
            # Actualizamos perfil
            $this->model->update($user, $id, $rol);

            $_SESSION['mensaje'] = 'Usuario modificado correctamente';

            header('location:' . URL . 'users');





        }

    }

    function mostrar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            # id de la cuenta
            $id = $param[0];

            $this->view->title = "Formulario Cuenta Mostar";
            $this->view->users = $this->model->getUserId($id);
            $this->view->roles = $this->model->getRoles();

            $this->view->render("users/mostrar/index");
        }
    }



    function ordenar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Users";
            $this->view->users = $this->model->order($criterio);
            $this->view->render("users/main/index");

        }
    }

    function buscar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "users");
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Users";
            $this->view->users = $this->model->filter($expresion);
            $this->view->render("users/main/index");
        }
    }
}