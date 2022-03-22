<?php

namespace App\Handler;

use App\Enums\LoggerLevelCode;

class SysLoggerHandler extends LoggerHandler implements SysLoggerHandlerInterface
{
    protected function handleLog(LoggerLevelCode $levelCode, string $line): void
    {
        syslog(LoggerLevelCode::getCodeByLevel($levelCode), $line);
    }
}