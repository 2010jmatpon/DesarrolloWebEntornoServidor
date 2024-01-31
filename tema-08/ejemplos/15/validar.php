<?php
#iniciar sesión
session_start();

$nombre = filter_var($_POST['nombre'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
$observaciones = filter_var($_POST['observaciones'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);

$fichero = $_FILES['fichero'];

$FileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

#Validacion
$errores = [];
if (($fichero['error']) !== UPLOAD_ERR_OK) {

} else if (is_uploaded_file($fichero['tmp_name'])) {
    #validar máximo tamaño
    $max_tamaño = 2 * 1024 * 1024;

    if ($fichero['size'] > $max_tamaño) {
        $errores['$fichero'] = "Tamaño de archivo no permitido. Máximo 2MB";
    }

    $info = new SplFileInfo($fichero['name']);
    $tipos_permitidos = ['JPG', 'GIF', 'PNG'];
    if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
        $errores['$fichero'] = "Tipo de archivo no permitido. Sólo JPG, PNG y GIF";
    }

    if (!empty($errores)) {
        #Formulario no validado
        header('location: index.php');
    } else {
        #Mover fichero desde carpeta temporal a carpeta del servidor
        move_uploaded_file($fichero['tmp_name'], 'files/' . $fichero['name']);

        #regreso al formulario
        header('location: index.php');

    }

}
