<?php

    $fecha = $hora = $tipo = $capacidad = $nombre = $fields_string = "";

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];
    $nombre = $_POST['nombre'];

    $horaCF = $hora . ":00";
    $nombre = str_replace(' ','-', $nombre);


    $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita?fecha=".$fecha."&hora=".$horaCF."&tipo=".$tipo."&capacidad=".$capacidad."&nombre=".$nombre;
    
    $fields = array(
        'fecha' => urlencode($_POST['fecha']),
        'hora' => urlencode($_POST['hora']),
        'tipo' => urlencode($_POST['tipo']),
        'capacidad' => urlencode($_POST['capacidad'])
    );

    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POST, count($fields));
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);
    
    header("Location: index.php");

?>