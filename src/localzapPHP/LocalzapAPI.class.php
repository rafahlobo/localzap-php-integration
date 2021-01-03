<?php

namespace Localzap;

require_once(__DIR__ . "/../exceptions/ProtocolException.php");
require_once(__DIR__ . "/../utils.php");


class LocalzapAPI
{
    protected String $baseurl;
    protected String $token;

    protected function __construct(String $baseurl, String $token)
    {
        $this->baseurl = $baseurl;
        $this->token = $token;
    }
    public function makePostRequest(String $endpoint, String $phoneNumber, String $message)
    {
        return makePostRequest($endpoint, $this->token, [
            "phone" => $phoneNumber,
            "message" => $message
        ]);
    }

    public function sendText(String $phoneNumber, String $message): bool
    {
        $endpoint = $this->baseurl . "/message";
        $response = $this->makePostRequest($endpoint, $phoneNumber, $message);
        return $response === "OK";
    }

    public static function create(
        String $token,
        String $protocol = "http",
        String $host = "localhost",
        int $port = 3000,
        String $version = "v1"
    ): LocalzapAPI {
        validateProtocol($protocol);
        $baseurl = "$protocol://$host:$port/$version";
        return new LocalzapAPI($baseurl, $token);
    }
}
