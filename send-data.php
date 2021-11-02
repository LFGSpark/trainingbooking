<?php

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $postData = array(
        'fecha'=> $fecha,
        'hora'=> $hora,
        'tipo'=> $tipo,
        'capacidad'=> $capacidad
        );

    $string = http_build_query($postData);
    $url = 'https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita';
    $jsonResponse = rest_call("POST", $url, $string, 'application/x-www-form-urlencoded');
    $response = json_decode($jsonResponse);

?>