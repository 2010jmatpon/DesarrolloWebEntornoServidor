<?php

class Cuenta extends Controller
{

    function __construct()
    {

        parent::__construct();


    }

    function render()
    {

        # Creo la propiedad title de la vista
        $this->view->title = "Home - Panel Control Cuentas";

        # Creo la propiedad cuentas dentro de la vista
        # Ejecuto el método get() para obtener la lista de cuentas;
        $this->view->cuentas = $this->model->get();

        #Cargo la vista principal
        $this->view->render('cuenta/main/index');
    }

    function new()
    {

        # Titulo de la vista
        $this->view->title = "Añadir - Gestión Cuentas";

        #  Obtengo los clientes para la generación dinámica de la lista de clientes
        $this->view->clientes = $this->model->getClientes();

        # cargo la vista con el formulario de la nueva cuenta
        $this->view->render('cuenta/new/index');
    }

    function create($param = [])
    {

        # Cargodatos del formulario
        $cuenta = new ClassCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']
        );

        # Añado el registro a la tabla
        $this->model->create($cuenta);

        # Redirijo al main de cuentas
        header('location:' . URL . 'cuenta');
    }

    function edit($param = [])
    {

        $id = $param[0];

        # asigno id a una propiedad de la vista
        $this->view->id = $id;

        # título
        $this->view->title = "Editar - Panel de control Cuentas";

        # obtego el objeto de la clase cuenta
        $this->view->cuenta = $this->model->read($id);

        # obtengo los clientes para la generación dinámica de la lista de clientes
        $this->view->clientes = $this->model->getClientes();

        # cargo la vista
        $this->view->render('cuenta/edit/index');

    }

    public function update($param = [])
    {

        # Cargo id de la cuenta
        $id = $param[0];

        # Creo objeto cuenta con los detalles formulario 
        $cuenta = new ClassCuenta(

            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']

        );

        # Actualizo base  de datos
        $this->model->update($cuenta, $id);

        # Cargo el controlador principal de cuenta
        header('location:' . URL . 'cuenta');

    }


    function delete($param)
    {
        # Cargo id del cliente
        $this->view->id = $param[0];

        # ejecuto la función delete
        $this->view->delete = $this->model->delete($this->view->id);

        # redirijo al main de cuentas
        header('location: ' . URL . 'cuenta');

    }

    function show($param)
    {
        # Cargo id del cliente
        $this->view->id = $param[0];

        #título
        $this->view->title = "Mostrar - Datos de la Cuenta";

        # Obtengo los clientes
        $this->view->clientes = $this->model->getClientes();

        #ejecuto la función read
        $this->view->cuenta = $this->model->read($this->view->id);

        # cargo la vista de mostrar
        $this->view->render('cuenta/show/index');


    }


    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Título de la vista
        $this->view->title = "Ordenar - Panel Control Cuentas";

        # Creo la propiedad cuentas dentro de la vista
        $this->view->cuentas = $this->model->order($criterio);

        # Cargo la vista principal de cuentas
        $this->view->render('cuenta/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo expresión de búsqueda
        $expresion = $_GET['expresion'];

        # Título de la vista
        $this->view->title = "Buscar - Panel Control Cuentas";

        # Filtro a partir de la  expresión
        $this->view->cuentas = $this->model->filter($expresion);

        # Cargo la vista principal de cuenta
        $this->view->render('cuenta/main/index');
    }
}

?>