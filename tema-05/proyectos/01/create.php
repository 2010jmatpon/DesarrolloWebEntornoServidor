<?php

    /*

        Controlador: create.php
        Descripción: permite añadir a la tabla un nuevo artículo
        a partir de los detalles del formulario. Luego los muestra
        en  pantalla  mediante la  vista principal.
    */

    # Class
    include 'class/class.arrayArticulo.php';
    include 'class/class.articulo.php';

    # Model
    include 'models/model.create.php';


    # Vista
    include 'views/view.index.php';

?>