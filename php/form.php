<?php

$error = '';
$cuerpo = '';
$nombre = '';
$email = '';
$mensaje = '';

// Validando nombre
if(empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
} else {
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre == ''){
        $error .= 'Nombre esta vacio </br>';
    }
}

// Validando el email
if(empty($_POST["email"])){
    $error .= 'Ingresa un E-mail </br>';
} else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail valido </br>';
    } else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}

// Validando mensaje
if(empty($_POST["mensaje"])){
    $error .= 'Ingresa un mensaje </br>';
} else {
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje == ''){
        $error .= 'Mensaje está vacío </br>';
    }
}

// Cuerpo del mensaje
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "\n";

$cuerpo .= "E-mail: ";
$cuerpo .= $email;
$cuerpo .= "\n";

$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;
$cuerpo .= "\n";

// Direccion
$enviarA = 'samueldomj15@gmail.com'; // Reemplazar correo electrónico
$asunto = 'Nuevo mensaje de contacto del sitio web D&C Tech';

// Enviar correo
if($error == ''){
    mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
} else{
    echo $error;
}

?>
