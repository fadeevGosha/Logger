<?php

namespace App\Formatters;

use App\Enums\LoggerLevelCode;

interface LineFormatterInterface
{
    public function getLine(LoggerLevelCode $levelCode, string $message);
}