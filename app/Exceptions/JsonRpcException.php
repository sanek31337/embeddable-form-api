<?php

namespace App\Exceptions;

use AvtoDev\JsonRpc\Errors\ErrorInterface;
use Exception;

class JsonRpcException extends Exception implements ErrorInterface
{
    public function getData()
    {
        return $this->getMessage();
    }
}
