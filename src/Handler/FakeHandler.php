<?php

namespace App\Handler;

use App\Enums\LoggerLevelCode;

class FakeHandler implements FakeHandlerInterface
{
    public function log(LoggerLevelCode $levelCode, string $message): void
    {
    }
}