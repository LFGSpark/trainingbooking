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

        $url = "https://personal-hezqtnbk.outsystemscloud.com/GymBooking/rest/Entrenamientos/CrearCita";
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
         );
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $data = <<<DATA
        {
          "fecha": "2021-11-05",
          "hora": "22:00:00",
          "tipo": bike,
          "capacidad": 1
        }
        DATA;


        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);

    header("Location: index.php");

?>