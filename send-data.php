<?php

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita";

    $data_array = array(
        "fecha" => "2021-11-05",
        "hora" => "17:00:00",
        "tipo" => "bike",
        "capacidad" => 1
    );

    $ch = curl_init($url);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'accept:application/json',
            'accept-encoding:gzip, deflate',
            'accept-language:en-US,en;q=0.8',
            'content-type:application/json',
            'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36'
        )
    );

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_array);

    $result = curl_exec($ch);
    curl_close($ch);


?>