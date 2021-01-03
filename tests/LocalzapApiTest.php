<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/localzapPHP/LocalzapAPI.class.php';
require_once __DIR__ . '/../src/exceptions/ProtocolException.php';
require_once __DIR__ . '/../src/utils.php';

use PHPUnit\Framework\TestCase;
use Localzap\LocalzapAPI;
// use Localzap\Exception\ProtocolException;

class LocalzapApiTest extends TestCase
{
    /**
     * @expectedException Localzap\Exception\ProtocolException
     */
    public function testCheckIfProtocolIsInValid()
    {
        validateProtocol("ssl");
    }
    public function testCheckIfProtocolIsValid()
    {
        validateProtocol("https");
        validateProtocol("http");
    }
}
