<?php

    //inicializacion de variables
    $fecha = $hora = $tipo = $nombre = $fields_string = "";

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];

    //formato de hora correcto para outsystems
    $horaCF = $hora . ":00";

    //se remplazan espacios en variable nombre
    $nombre = str_replace(' ','-', $nombre);

    //url del POST
    //$url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita";
    $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita?fecha=".$fecha."&hora=".$horaCF."&tipo=".$tipo."&nombre=".$nombre;

    //inicia curl
    $ch = curl_init();

    //config de curl
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "luisfernando.gomez@sparktechs.com:Luis8888.");
    curl_setopt($ch, CURLOPT_POST, true);

    //consume el api rest post con el url proveido
    $result = curl_exec($ch);

    //cierra curl
    curl_close($ch);
    
    header("Location: index.php");

?>