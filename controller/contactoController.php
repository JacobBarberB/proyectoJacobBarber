<?php

class contactoController{    
    public function contacto(){
        include "config/session.php";
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        include "views/contacto.php";
        include "views/includes/footer.php";
    }
    public function enviar_mail(){
        include "config/session.php";
        $email_to = "jacob_barber@outlook.es";
        $email_subject = "Contacto desde el sitio web";

        $email_message = "Detalles del formulario de contacto:\n\n";
        $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
        $email_message .= "Apellido: " . $_POST['apellido'] . "\n";
        $email_message .= "Teléfono: " . $_POST['telefono'] . "\n";
        $email_message .= "E-mail: " . $_POST['email'] . "\n";
        $email_message .= "Comentarios: " . $_POST['observaciones'] . "\n\n";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        header("location: contacto");
    }
}