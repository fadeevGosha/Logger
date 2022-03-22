<?php

namespace App\Logger;

use App\Enums\LoggerLevelCode;

interface LoggerInterface
{
    public function log(LoggerLevelCode $levelCode, string $message);

    public function error(string $message);

    public function info(string $message);

    public function debug(string $message);

    public function notice(string $message);
}