<?php

require(__DIR__ . "/../src/localzapPHP/LocalzapAPI.class.php");

use Localzap\LocalzapAPI;
use Localzap\Exception\ProtocolException;


$token = "a8e2d307-462d-488d-a75f-f15a25ca0272";
$host = "localhost";
$version = "v1";
$port = 3000;
$protocol = "http";

try {
    $locazapAPI = LocalzapAPI::create($token, $protocol, $host, $port, $version);
    if ($locazapAPI->sendText("5521999999999", "TESTE")) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Houve um problema ao enviar a mensagem.";
    }
} catch (ProtocolException $e) {
    echo $e->getMessage();
}
