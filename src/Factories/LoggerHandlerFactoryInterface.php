<?php

namespace App\Factories;

use App\Enums\LoggerLevelCode;

interface LoggerHandlerFactoryInterface
{
    public function createHandler(LoggerLevelCode $level);
}