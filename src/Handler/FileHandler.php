<?php

namespace App\Handler;

use App\Enums\LoggerLevelCode;
use App\Exceptions\LoggerUnavailableException;
use App\Formatters\LineFormatterInterface;

class FileHandler extends LoggerHandler implements FileHandlerInterface
{
    public const LOG_PATH = __DIR__ . '/../.logs/';

    public function __construct(
        bool $isEnabled = true,
        ?LineFormatterInterface $lineFormatter = null,
        private ?string $fileName = null
    ) {
        $this->isEnabled = $isEnabled;
        $this->lineFormatter = $lineFormatter;
        parent::__construct($isEnabled, $lineFormatter);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function info(string $message): void
    {
        $this->log(LoggerLevelCode::INFO, $message);
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    protected function handleLog(LoggerLevelCode $levelCode, string $line): void
    {
        file_put_contents(
            $this->fileName ?? $this->getFileNameByCode($levelCode),
            $line . PHP_EOL,
            FILE_APPEND
        );
    }

    private function getFileNameByCode(LoggerLevelCode $levelCode): string
    {
        match ($levelCode) {
            LoggerLevelCode::ERROR, LoggerLevelCode::INFO =>
            $fileName = sprintf(
                "%s.%s",
                self::DEFAULT_FILE_NAME,
                $levelCode->value
            ),
            default => $fileName = static::DEFAULT_FILE_NAME
        };

        return sprintf('%s%s.log', static::LOG_PATH, $fileName);
    }
}