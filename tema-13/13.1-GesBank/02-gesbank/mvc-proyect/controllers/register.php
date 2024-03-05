<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'auth.php';
class Register extends Controller
{

    public function render()
    {

        # iniciamos o continuar sessión
        session_start();

        # Si existe algún mensaje 
        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }

        # Inicializamos los campos del formulario
        $this->view->name = null;
        $this->view->email = null;
        $this->view->password = null;

        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Variables de autorrelleno
            $this->view->name = $_SESSION['name'];
            $this->view->email = $_SESSION['email'];
            $this->view->password = $_SESSION['password'];
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);

            # Tipo de error
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);

        }

        $this->view->render('register/index');
    }


    public function validate()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Saneamos el formulario
        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_SPECIAL_CHARS);

        # Validaciones

        $errores = array();

        # Validar name
        if (empty($name)) {
            $errores['name'] = "Campo obligatiorio";
        } else if (!$this->model->validaName($name)) {
            $errores['name'] = "Nombre de usuario no permitido";
        }

        # Validar Email
        if (empty($email)) {
            $errores['email'] = "Campo obligatorio";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Email: Email no válido";
        } elseif (!$this->model->validateEmailUnique($email)) {
            $errores['email'] = "Email existente, ya está registrado";
        }

        # Validar password
        if (empty($password)) {
            $errores['password'] = "No se ha introducido una contraseña";
        } else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Password no coincidentes";
        } elseif (!$this->model->validatePass($password)) {
            $errores['password'] = "Password: No permitido";
        }

        if (!empty($errores)) {

            $_SESSION['errores'] = $errores;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['error'] = "Fallo en la validación del formulario";

            header("location:" . URL . "register");

        } else {

            # Añade nuevo usuario

            $this->model->create($name, $email, $password);
            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";

                // Credenciales SMPT gmail
                $mail->Username = USERNAME;

                $mail->Password = PASS;


                $mail->isSMTP();                                            
                $mail->Host = 'smtp.gmail.com';                       
                $mail->SMTPAuth = true;                                   
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port = 587;                                    

                //Cabecera del email
                $destinatario = $email ;
                $remitente = USERNAME;
                $asunto = "Nuevo Usuario Gesbank";
                $mensaje = "
                <h1>Bienvenido a Gesbank " . $name . "</h1>
                Desde el equipo de Gesbank estamos encantados de poder darte la bienvenida
                a nuestros servicios y es por eso que esperamos que disfrute de ellos y tenga una grata experiencia junto a nosotros.
                <br>
                Estas son sus credenciales:
                <br>
                <b>Nombre: </b> " . $name . " 
                <br>
                <b>Usuario: </b> " . $email . "
                <br>
                <b>Contraseña: </b> " . $password . "
                <br>
                <br>
                Un saludo.
                <br>
                El equipo Gesbank.
                ";
                $mail->setFrom($remitente, 'Juan María');
                $mail->addAddress($destinatario, $name);
                $mail->addReplyTo($remitente, 'Juan María');

                //Contenido
                $mail->isHTML(true);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;

                // Enviamos el mensaje
                $mail->send();

                echo 'Message has been sent';

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            }
            $_SESSION['mensaje'] = "Usuario registrado correctamente";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            #Vuelve login
            header("location:" . URL . "login");
            exit();
        }



    }

}

?>