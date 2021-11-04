<?php

    //inicializacion de variables
    $fecha = $hora = $tipo = $capacidad = $nombre = $fields_string = "";

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];
    $nombre = $_POST['nombre'];

    //formato de hora correcto para outsystems
    $horaCF = $hora . ":00";

    //se remplazan espacios en variable nombre
    $nombre = str_replace(' ','-', $nombre);

    //url del POST
    $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita?fecha=".$fecha."&hora=".$horaCF."&tipo=".$tipo."&capacidad=".$capacidad."&nombre=".$nombre;
    
    //arreglo de variables (sin uso)
    $fields = array(
        'fecha' => urlencode($_POST['fecha']),
        'hora' => urlencode($_POST['hora']),
        'tipo' => urlencode($_POST['tipo']),
        'capacidad' => urlencode($_POST['capacidad'])
    );

    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //inicia curl
    $ch = curl_init();

    //config de curl
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POST, count($fields));
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //consume el api rest post con el url proveido
    $result = curl_exec($ch);

    //cierra curl
    curl_close($ch);
    
    header("Location: index.php");

?>