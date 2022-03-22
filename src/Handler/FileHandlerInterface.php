<?php

namespace App\Handler;

interface FileHandlerInterface extends LoggerHandlerInterface
{
    public function info(string $message): void;

    public function setIsEnabled(bool $isEnabled): FileHandler;
}