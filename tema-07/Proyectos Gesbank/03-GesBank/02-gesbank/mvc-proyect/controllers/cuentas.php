<?php

class Cuentas extends Controller
{

    # Método render
    # Principal del controlador Cuentas
    # Muestra los detalles de la tabla Cuentas
    function render($param = [])
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
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->get();
            $this->view->render("cuentas/main/index");
        }
    }

    # Método nuevo
    # Permite mostrar un formulario que permita añadir una nueva cuenta
    function nuevo($param = [])
    {
        # Continuamos la sesion
        session_start();
        # Creamos un objeto vacio
        $this->view->cuentas = new classCuenta();

        # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            $this->view->title = "Formulario añadir cuenta";

            // Para generar la lista select dinámica de clientes
            $this->view->cuentas = $this->model->getClientes();

            $this->view->render("cuentas/nuevo/index");
        }
    }

    # Método create
    # Envía los detalles para crear una nueva cuenta
    function create($param = [])
    {
        #Iniciar Sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else {
            #1.Seguridad. Saneamos los datos del formulario
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_ul_mov = filter_var($_POST['fecha_ul_mov'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_movtos = filter_var($_POST['num_movtos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_EMAIL);

            #2. Creamos cliente con los datos saneados
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                $fecha_ul_mov,
                $num_movtos,
                $saldo,
                null,
                null
            );

            #3.Validacion
            $errores = [];

            //Cuenta. Obligatorio, formato 20 dígitos numéricos, valor con restricción unique en la tabla cuentas

            if (empty($num_cuenta)) {
                $errores['num_cuenta'] = 'El campo cuenta es obligatorio';
            } else if (strlen($num_cuenta) !== 20) {
                $errores['num_cuenta'] = 'El campo cuenta es demasiado largo o demasiado corto';

            } else if (!$this->model->validateUniqueCuenta($num_cuenta)) {
                $errores['num_cuenta'] = 'La cuenta ya existe';
            }

            //Cliente. Obligatorio, valor numérico, ha de existir en la tabla clientes.
            if (empty($id_cliente)) {
                $errores['id_cliente'] = 'El campo cliente es obligatorio';
            } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                $errores['id_cliente'] = 'Cliente no valido';
            }

            if (!empty($errores)) {
                //errores de validacion
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                header('location:' . URL . 'cuentas/nuevo');

            } else {
                $this->model->create($cuenta);
                #Mensaje
                $_SESSION['mensaje'] = "Cuenta creada correctamente";
                header("Location:" . URL . "cuentas");
            }

        }
    }

    # Método delete
    # Permite eliminar una cuenta de la tabla
    function delete($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            $id = $param[0];
            $this->model->delete($id);
            $_SESSION['mensaje'] = 'Alumno eliminado correctamente';

            header("Location:" . URL . "cuentas");
        }
    }

    # Método editar
    # Muestra los detalles de una cuenta en un formulario de edición
    # Sólo se podrá modificar el titular o cliente de la cuenta
    function editar($param = [])
    {

        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else {
            $id = $param[0];

            $this->view->id = $id;
            $this->view->title = "Formulario editar cuenta";
            $this->view->clientes = $this->model->getClientes();
            $this->view->cuenta = $this->model->getCuenta($id);

            // // formateamos la fecha
            // $fechaf=(str_split($this->view->cuenta->fecha_alta));
            // for ($i=0; $i <9 ; $i++) { 
            //     array_pop($fechaf);
            // }
            // $fechafort=implode($fechaf);
            // $this->view->cuenta->fecha_alta=$fechafort;

            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuentas']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            $this->view->render("cuentas/editar/index");
        }
    }

    # Método update
    # Envía los detalles modificados de una cuenta para su actualización en la tabla
    function update($param = [])
    {
        #Iniciar Sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['edit']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {

            #1.Seguridad. Saneamos los datos del formulario
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_ul_mov = filter_var($_POST['fecha_ul_mov'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_movtos = filter_var($_POST['num_movtos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_EMAIL);

            #2. Creamos cliente con los datos saneados
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                $fecha_ul_mov,
                $num_movtos,
                $saldo,
                null,
                null
            );
            $id = $param[0];

            #Obtengo el objeto cliente original
            $cuenta_orig = $this->model->read($id);

            #3.Validacion
            $errores = [];

            //Cuenta. Obligatorio, formato 20 dígitos numéricos, valor con restricción unique en la tabla cuentas

            if (strcmp($cuenta->num_cuenta, $cuenta_orig->num_cuenta) !== 0) {

                if (empty($num_cuenta)) {
                    $errores['num_cuenta'] = 'El campo cuenta es obligatorio';
                } else if (strlen($num_cuenta) !== 20) {
                    $errores['num_cuenta'] = 'El campo cuenta es demasiado largo o demasiado corto';

                } else if (!$this->model->validateUniqueCuenta($num_cuenta)) {
                    $errores['num_cuenta'] = 'La cuenta ya existe';
                }
            }
            //Cliente. Obligatorio, valor numérico, ha de existir en la tabla clientes.
            if (strcmp($cuenta->id_cliente, $cuenta_orig->id_cliente) !== 0) {

                if (empty($id_cliente)) {
                    $errores['id_cliente'] = 'El campo cliente es obligatorio';
                } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                    $errores['id_cliente'] = 'Cliente no valido';
                }
            }
            if (!empty($errores)) {
                //errores de validacion
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                header('location:' . URL . 'cuentas/editar');

            } else {
                $this->model->update($cuenta, $id);
                #Mensaje
                $_SESSION['mensaje'] = "Cuenta editada correctamente";
                header("Location:" . URL . "cuentas");
            }
        }
    }


    # Método mostrar
    # Muestra los detalles de una cuenta en un formulario no editable
    function mostrar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            # id de la cuenta
            $id = $param[0];

            $this->view->title = "Formulario Cuenta Mostar";
            $this->view->cuenta = $this->model->getCuenta($id);
            $this->view->cliente = $this->model->getCliente($this->view->cuenta->id_cliente);

            // // formateamos la fecha
            // $fechaf=(str_split($this->view->cuenta->fecha_alta));
            // for ($i=0; $i <9 ; $i++) { 
            //     array_pop($fechaf);
            // }
            // $fechafort=implode($fechaf);
            // $this->view->cuenta->fecha_alta=$fechafort;

            $this->view->render("cuentas/mostrar/index");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla cuenta a partir de alguna de las columnas de la tabla
    function ordenar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->order($criterio);
            $this->view->render("cuentas/main/index");

        }
    }

    # Método buscar
    # Permite realizar una búsqueda en la tabla cuentas a partir de una expresión
    function buscar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->filter($expresion);
            $this->view->render("cuentas/main/index");
        }
    }
}
