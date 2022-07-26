<?php

namespace Taxref\Exceptions;

use Throwable;

class MalformedUrlException extends \Exception
{
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}