<?php

$access_token = $_POST['access_token'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$suscripcion = $_POST['suscripcion'];

$service_url = 'https://creator.zoho.com';

function create_record($access_token, $nombre, $correo, $suscripcion){
    $service_url = $GLOBALS['service_url'] . '/api/v2/chispas/training-bookings/form/Usuarios';
    $data = array("data" => array("Nombre_field" => $nombre,"Correo_field" => $correo,"Suscripcion_field" => $suscripcion));
    $header = array(
        'Authorization: Zoho-oauthtoken ' . $access_token, 
        'Content-Type: application/json'
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

$result = create_record($access_token, $nombre, $correo, $suscripcion);

//print $result;

header('Location: ' . $_SERVER['HTTP_REFERER'])

?>