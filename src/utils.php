<?php
use Localzap\Exception\ProtocolException;

function validateProtocol($protocol)
{
    $allow_protocols = ["http", "https"];
    if (!in_array($protocol, $allow_protocols)) {
        throw new ProtocolException("Protocol '$protocol' is not allowed! Use only 'http' or 'https");
    }
}

function createPayloadRequest(String $token, array $data)
{
    $postdata = http_build_query($data);
    $opts = [
        'http' => [
            'method'  => 'POST',
            'header'  => [
                "Authorization: Bearer $token",
                'Content-Type: application/x-www-form-urlencoded',
            ],
            'content' => $postdata
        ],
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ]
    ];
    return stream_context_create($opts);
}

function makePostRequest(String $url, String $token, array $data)
{
    $context = createPayloadRequest($token, $data);
    return @file_get_contents($url, false, $context);
}
