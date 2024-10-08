<?php
namespace App\Main\Region\Exception;

class RegionException extends \Exception
{
    public function __construct($message = "", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
