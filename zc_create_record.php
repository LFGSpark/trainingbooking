<?php

session_start();

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
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
}

//EJECUCION DE FUNCION
$result_user_record = create_user_record($access_token, $nombre, $correo, $suscripcion);

//ASIGNACION DE VALOR A VARIABLE 'ID_user'
foreach($result_user_record->data as $item){
    $ID_user = $item;
}

//FUNCION PARA HACER INSERT EN LA TABLA "Entrenamientos"
function create_booking_record($access_token, $tipo, $fecha, $hora, $ID_user){

    if($tipo == "BIKE"){
        $capacidad = 1;
    } else if($tipo == "EMS"){
        $capacidad = 4;
    }

    $service_url = $GLOBALS['service_url'] . '/api/v2/chispas/training-bookings/form/Entrenamientos';
    $data = array("data" => array("Tipo_field" => $tipo, "Date_field" => $fecha, "Time_field" => $hora, "Capacidad_field" => $capacidad, "Usuario_field" => $ID_user));
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
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
}

//FUNCION PARA A??ADIR PARTICIPANTE A ENTRENAMIENTO
function create_assistant_record($access_token, $ID_booking, $ID_user){

    $service_url = $GLOBALS['service_url'] . '/api/v2/chispas/training-bookings/form/Asistentes';
    $data = array("data" => array("Entrenamiento_ID_field" => $ID_booking, "Usuario_field" => $ID_user));
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

//EJECUCION DE FUNCION
$result_booking_record = create_booking_record($access_token, $tipo, $fecha, $hora, $ID_user);

//ASIGNACION DE VALOR A VARIABLES 'ID_booking'

//foreach($result_booking_record->data as $item){
//    $ID_booking = $item;
//}

//$result_assistant_record = create_assistant_record($access_token, $ID_booking, $ID_user);

//IMPRESION DE RESULTADOS PARA DEBUG
echo '<br />';
print_r($result_user_record);
echo '<br />';
print_r($result_booking_record);
echo '<br />';
//print_r($result_assistant_record);
echo '<br />';

//ERROR HANDLING BOOKING RECORD
//foreach($result_booking_record->error as $text){
//    $error = $text;
//}
//$error_booking_record = get_object_vars($error);
//print_r($error_booking_record['message']);

//header('Location: ' . $_SERVER['HTTP_REFERER'])

?>