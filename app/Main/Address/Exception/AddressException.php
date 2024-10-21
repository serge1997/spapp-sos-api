<?php
namespace App\Main\Address\Exception;

class AddressException extends \Exception
{
    public function __construct($message = "", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
