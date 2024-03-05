<?php

class Movimientos extends Controller
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


            $this->view->title = "Tabla Movimientos";
            $this->view->movimientos = $this->model->get();
            $this->view->render("movimientos/main/index");
        }
    }

    # Método nuevo. Muestra formulario añadir cliente
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
            $this->view->movimiento = new classMovimiento();

            # Comprobamos si hay errores -> esta variable se crea al lanzar un error de validacion
            if (isset($_SESSION['error'])) {
                // rescatemos el mensaje
                $this->view->error = $_SESSION['error'];

                // Autorellenamos el formulario
                $this->view->movimiento = unserialize($_SESSION['movimiento']);

                // Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                // debemos liberar las variables de sesión ya que su cometido ha sido resuelto
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['movimientos']);
                // Si estas variables existen cuando no hay errores, entraremos en los bloques de error en las condicionales
            }

            $this->view->title = "Formulario movimiento nuevo";
            $this->view->movimientos = $this->model->getCuentas();

            $this->view->render("movimientos/new/index");
        }
    }
    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    function create($param = [])
    {
        #Iniciar Sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['new']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "cuentas");
        } else {
            #1.Seguridad. Saneamos los datos del formulario
            $id_cuenta = filter_var($_POST['id_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_hora = filter_var($_POST['fecha_hora'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $concepto = filter_var($_POST['concepto'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_var($_POST['tipo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $cantidad = filter_var($_POST['cantidad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_EMAIL);

            #2. Creamos cliente con los datos saneados
            $movimiento = new classMovimiento(
                null,
                $id_cuenta,
                $fecha_hora,
                $concepto,
                $tipo,
                $cantidad,
                $saldo,
                null,
                null
            );

            #3.Validacion
            $errores = [];

            //Cliente. Obligatorio, valor numérico, ha de existir en la tabla clientes.
            if (empty($id_cuenta)) {
                $errores['id_cuenta'] = 'El campo cuenta es obligatorio';
            } else if (!filter_var($id_cuenta, FILTER_VALIDATE_INT)) {
                $errores['id_cuenta'] = 'Cliente no valido';
            }

            if (!empty($errores)) {
                //errores de validacion
                $_SESSION['movimiento'] = serialize($movimiento);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                header('location:' . URL . 'movimientos/new');

            } else {
                $this->model->create($movimiento);
                #Mensaje
                $_SESSION['mensaje'] = "Movimiento creado    correctamente";
                header("Location:" . URL . "movimientos");
            }

        }
    }


    # Método mostrar
    # Muestra en un formulario de solo lectura los detalles de un cliente
    public function mostrar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['show']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $id = $param[0];
            $this->view->title = "Formulario Cliente Mostar";
            $this->view->cliente = $this->model->getCliente($id);
            $this->view->render("clientes/mostrar/index");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla de clientes por cualquiera de las columnas de la tabla
    public function ordenar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['order']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $criterio = $param[0];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->order($criterio);
            $this->view->render("clientes/main/index");
        }

    }

    # Método buscar
    # Permite buscar los registros de clientes que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");

        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['filter']))) {
            $_SESSION['mensaje'] = "Operación sin privilegio";
            header("location:" . URL . "clientes");
        } else {
            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Clientes";
            $this->view->clientes = $this->model->filter($expresion);
            $this->view->render("clientes/main/index");
        }
    }


}




