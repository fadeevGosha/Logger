<?php

namespace App\Exceptions;

class LoggerUnavailableException extends \Exception
{
    protected $message = 'The logger is unavailable';
}