<?php

namespace App\Logger;

use App\Enums\LoggerLevelCode;
use App\Exceptions\LoggerUnavailableException;
use App\Handler\FileHandler;
use App\Handler\LoggerHandlerInterface;

class Logger implements LoggerInterface
{
    private LoggerHandlerInterface $loggerHandler;

    public function __construct(LoggerHandlerInterface $loggerHandler = null)
    {
        $this->loggerHandler = $loggerHandler ?? new FileHandler(LOG_INFO);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function log(LoggerLevelCode $levelCode, string $message)
    {
        $this->loggerHandler->log($levelCode, $message);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function error(string $message)
    {
        $this->loggerHandler->log(LoggerLevelCode::ERROR, $message);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function info(string $message)
    {
        $this->loggerHandler->log(LoggerLevelCode::INFO, $message);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function debug(string $message)
    {
        $this->loggerHandler->log(LoggerLevelCode::DEBUG, $message);
    }

    /**
     * @throws LoggerUnavailableException
     */
    public function notice(string $message)
    {
        $this->loggerHandler->log(LoggerLevelCode::NOTICE, $message);
    }

    public function setLoggerHandler(LoggerHandlerInterface|FileHandler $loggerHandler): self
    {
        $this->loggerHandler = $loggerHandler;
        return $this;
    }
}