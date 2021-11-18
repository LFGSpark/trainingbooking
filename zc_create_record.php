<?php

//DECLARACION VARIABLES
$access_token = $_POST['access_token'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$suscripcion = $_POST['suscripcion'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$capacidad = "";
$service_url = 'https://creator.zoho.com';

//MODIFICACION DE LA VARIABLE "Fecha" AL FORMATO DE ZOHO CREATOR
$fechaZC = strtotime($fecha);
$fecha = date("d-M-Y", $fechaZC);

//FUNCION PARA HACER INSERT EN LA TABLA "Usuarios"
function create_user_record($access_token, $nombre, $correo, $suscripcion){
    $service_url = $GLOBALS['service_url'] . '/api/v2/chispas/training-bookings/form/Usuarios';
    $data = array("data" => array("Nombre_field" => $nombre,"Correo_field" => $correo,"Suscripcion_field" => $suscripcion));
    $header = array(
        'Authorization: Zoho-oauthtoken ' . $access_token, 
        'Content-Type: application/json',
        'environment: development'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $service_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//FUNCION PARA HACER INSERT EN LA TABLA "Entrenamientos"
function create_booking_record($access_token, $tipo, $fecha, $hora){

    if($tipo == "BIKE"){
        $capacidad = 1;
    } else if($tipo == "EMS"){
        $capacidad = 4;
    }

    $service_url = $GLOBALS['service_url'] . '/api/v2/chispas/training-bookings/form/Entrenamientos';
    $data = array("data" => array("Tipo_field" => $tipo, "Date_field" => $fecha, "Time_field" => $hora, "Capacidad_field" => $capacidad));
    $header = array(
        'Authorization: Zoho-oauthtoken ' . $access_token, 
        'Content-Type: application/json',
        'environment: development'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $service_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//EJECUCION DE FUNCIONES
$result_user_record = create_user_record($access_token, $nombre, $correo, $suscripcion);
$result_booking_record = create_booking_record($access_token, $tipo, $fecha, $hora);

//IMPRESION DE RESULTADOS PARA DEBUG
print_r($result_booking_record);
print_r($result_user_record);

//header('Location: ' . $_SERVER['HTTP_REFERER'])

?>