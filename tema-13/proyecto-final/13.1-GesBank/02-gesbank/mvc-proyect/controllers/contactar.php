<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'auth.php';
class Contactar extends Controller
{

    public function render()
    {
        session_start();

        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);
        }

        if (isset($_SESSION['errores'])) {
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['errores']);
        }

        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);

        }
        $this->view->title = "CONTACTA CON NOSOTROS";

        $this->view->render('contactar/index');
    }

    public function validar()
    {
        session_start();
        // Procesar el formulario de contacto
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensaje = filter_var($_POST['mensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validar campos
        $errores = [];

        if (empty($nombre)) {
            $errores['nombre'] = 'El nombre es obligatorio';
        }

        if (empty($email)) {
            $errores['email'] = 'El campo email es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El formato introducido es incorrecto';
        }

        if (empty($asunto)) {
            $errores['asunto'] = 'El asunto es obligatorio';
        }

        if (empty($mensaje)) {
            $errores['mensaje'] = 'El mensaje es obligatorio';
        }

        // Procesar formulario si no hay errores
        if (!empty($errores)) {

            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;



            // Redirigir después del envío
            header("Location: " . URL . "contactar");
            exit;
        } else {

            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";

                // Credenciales SMPT gmail
                $mail->Username = USERNAME;

                $mail->Password = PASS;


                // Configuración SMPT gmail
                $mail->SMTPDebug = 2;                                      
                $mail->isSMTP();                                            
                $mail->Host = 'smtp.gmail.com';                       
                $mail->SMTPAuth = true;                                   
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port = 587;                                    

                //Cabecera del email
                $destinatario = USERNAME;
                $remitente = $email;

                $mail->setFrom($remitente, $nombre);
                $mail->addAddress($destinatario, 'Juan María');
                $mail->addReplyTo($remitente, $nombre);

                //Contenido
                $mail->isHTML(true);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;

                // Enviamos el mensaje
                $mail->send();

                echo 'Message has been sent';
                $_SESSION['mensaje'] = "Mensaje enviado correctamente";


            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            }

            header("Location: " . URL . "contactar");
            exit;
        }
    }
}

?>