<?php

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];

    $info = array(
        'fecha'=> $fecha,
        'hora'=> $hora,
        'tipo'=> $tipo,
        'capacidad'=> $capacidad
        );

    // User data to send using HTTP POST method in curl
    $data = array('name'=>'New User 123','salary'=>'65000', 'age' => '33');

    // Data should be passed as json format
    $data_json = json_encode($data);

    // API URL to send data
    $url = 'https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita';

    // curl initiate
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // SET Method as a POST
    curl_setopt($ch, CURLOPT_POST, 1);

    // Pass user data in POST command
    curl_setopt($ch, CURLOPT_POSTFIELDS, $info);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute curl and assign returned data
    $response  = curl_exec($ch);

    // Close curl
    curl_close($ch);

    // See response if data is posted successfully or any error
    print_r ($response);

    header("Location: index.php");

?>