<?php
namespace App\Main\Sector\Exception;

class SectorException extends \Exception
{
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
}
