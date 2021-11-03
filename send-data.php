<?php

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita";

    $data_array = array(
        'fecha' => '2021-11-02',
        'hora' => '16:00:00',
        'tipo' => 'bike',
        'capacidad' => '1'
    );

    $data = http_build_query($data_array);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        'Content-type: application/json'
    );

    curl_setopt($ch, CURLTOP_HTTPHEADER, $headers);

    $resp = curl_exec($ch);

    if($e = curl_exec($ch)) {
        echo $e;
    }
    else {
        $decoded = json_decode($resp);
        foreach($decoded as $key => $val){
            echo $key . ': ' . $val . '<br>';
        }
    }

    curl_close($ch);

?>