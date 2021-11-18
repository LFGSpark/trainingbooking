<?php

$client_id = '1000.TQ9N21TT4Z1ZX46AV2NXVLXENTVH8E';
$client_secret = '9e4892bf7921c1936d3b630bddf472ff64f5a0e44e';
$api_code = '1000.09c50ab7839e397087ce5690645b38aa.a27203294fe32a83d7ba57a839b55fa0';
$base_acc_url = 'https://accounts.zoho.com';

$token_url =  $base_acc_url . '/oauth/v2/token?grant_type=authorization_code&client_id=' . $client_id. '&client_secret=' . $client_secret . '&redirect_uri=http://localhost&code=' . $api_code;


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

//$datos = generate_refresh_token($token_url);

$refresh_token = '1000.cf51e9929b6940651bbdda7ee972247b.268e005ad4b0dad3fe4e5decb0c4d080';
$access_token_url = $base_acc_url.'/oauth/v2/token?refresh_token='.$refresh_token.'&client_id='.$client_id.'&client_secret='.$client_secret.'&grant_type=refresh_token';

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

$access_token = refresh_access_token($access_token_url);
$access_token = json_decode($access_token);

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
                            foreach($access_token as $item){
                                echo $item . "<br />";
                            }
                        ?>
                    </div>
                </div>
                <input class="form-btn" type="submit" value="Generar" />
            </form>
        <div>
        
    </div>
    

</body>
</html>