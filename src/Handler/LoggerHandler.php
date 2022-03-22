<?php

namespace App\Handler;

use App\Enums\LoggerLevelCode;
use App\Exceptions\LoggerUnavailableException;
use App\Formatters\LineFormatter;
use App\Formatters\LineFormatterInterface;

abstract class LoggerHandler
{
    public const DEFAULT_FILE_NAME = 'application';

    public function __construct(
        protected bool $isEnabled = true,
        protected ?LineFormatterInterface $lineFormatter = null
    ) {
        $this->lineFormatter = $this->lineFormatter ?? new LineFormatter();
    }

    public function log(LoggerLevelCode $levelCode, string $message): void
    {
        if ($this->isEnabled) {
            $this->handleLog($levelCode, $this->getLine($levelCode, $message));
        } else {
            throw new LoggerUnavailableException();
        }
    }

    abstract protected function handleLog(LoggerLevelCode $levelCode, string $line);

    protected function getLine(LoggerLevelCode $levelCode, string $message): string
    {
        return $this->lineFormatter->getLine($levelCode, $message);
    }
}