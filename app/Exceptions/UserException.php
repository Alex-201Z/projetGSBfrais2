<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
    protected $userMessage;

    public function __construct($userMessage, $message = "", $code = 0)
    {

        parent::__construct($message);
        $this->userMessage = $userMessage;
        $this->code = $code;
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }
}
