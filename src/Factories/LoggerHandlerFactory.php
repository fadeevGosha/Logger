<?php

namespace App\Factories;

use App\Enums\LoggerLevelCode;
use App\Handler\FakeHandler;
use App\Handler\FileHandler;
use App\Handler\LoggerHandlerInterface;
use App\Handler\SysLoggerHandler;

class LoggerHandlerFactory implements LoggerHandlerFactoryInterface
{
    public function createHandler(LoggerLevelCode $level): LoggerHandlerInterface
    {
        return match ($level) {
            LoggerLevelCode::ERROR, LoggerLevelCode::INFO => new FileHandler(),
            LoggerLevelCode::DEBUG => new SysLoggerHandler(),
            default => new FakeHandler(),
        };
    }
}