<?php

namespace App\Handler;

use App\Enums\LoggerLevelCode;

interface LoggerHandlerInterface
{
    public function log(LoggerLevelCode $levelCode, string $message): void;
}