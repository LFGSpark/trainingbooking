<?php

$client_id = '1000.DV923KJIAP1UI51RA0O8S8DXTSOM2F';
$client_secret = '9e7a518438be1cfb749a2bb6ce92fcfa679f20c67b';
$code = '1000.3297b3114a0a30e2bc160c7afe324d91.7083d44f9cc1b8462260300bd20347cb';
$base_acc_url = 'https://accounts.zoho.com';

$token_url =  $base_acc_url . '/oauth/v2/token?grant_type=authorization_code&client_id=' . $client_id. '&client_secret=' . $client_secret . '&redirect_uri=http://localhost&code=' . $code;


//FUNCION PARA GENERAR ACCESS TOKEN Y REFRESH TOKEN
function generate_refresh_token($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$datos = generate_refresh_token($token_url);

//$refresh_token = '1000.1f06dddc483a2bc04c28fa3be17c9fb7.9e27cbc2e662d2ed1e29101ce80dda2b';
//$access_token_url = $base_acc_url.'/oauth/v2/token?refresh_token='.$refresh_token.'&client_id='.$client_id.'&client_secret='.$client_secret.'&grant_type=refresh_token';

//FUNCION PARA REFRESCAR ACCESS TOKEN
function refresh_access_token($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//$access_token = refresh_access_token($access_token_url);
//$access_token = json_decode($access_token);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <title>ZC REST API</title>
</head>
<body>

    <?php include "nav.html";?>

    <div class="container">
        <p class="form-title1">Generar Token de Acceso</p>    
        <div class="form-container">
            <form class="form" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">

                <div class="output">
                    <div class="output-text">
                        <?php
                            print $datos;
                        ?>
                    </div>
                </div>
                <input class="form-btn" type="submit" value="Generar" />
            </form>
        <div>
        
    </div>
    

</body>
</html>