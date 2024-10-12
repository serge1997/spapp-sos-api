<?php
namespace App\Main\Municpality\Exception;

class MunicipalityException extends \Exception
{
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
}
