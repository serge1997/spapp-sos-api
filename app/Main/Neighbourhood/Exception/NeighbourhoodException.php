<?php
namespace App\Main\Neighbourhood\Exception;

class NeighbourhoodException extends \Exception
{
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
}
