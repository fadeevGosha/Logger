<?php

namespace App\Enums;

use App\Exceptions\LoggerCodeNotFoundException;

enum LoggerLevelCode: string
{
    case ERROR = 'error';
    case INFO = 'info';
    case DEBUG = 'debug';
    case NOTICE = 'notice';

    public const AVAILABLE_CODES =
        [
            LOG_ERR,
            LOG_INFO,
            LOG_DEBUG,
            LOG_NOTICE
        ];

    public static function getLevelByCode(int $code): LoggerLevelCode
    {
        return match ($code) {
            LOG_ERR => self::ERROR,
            LOG_INFO => self::INFO,
            LOG_DEBUG => self::DEBUG,
            LOG_NOTICE => self::NOTICE,
            default => throw new LoggerCodeNotFoundException(
                sprintf(
                    'The logger code must contain one of the following values «%s»',
                    implode(',', self::AVAILABLE_CODES)
                )
            )
        };
    }

    public static function getCodeByLevel(LoggerLevelCode $level): string
    {
        return match ($level) {
            self::ERROR => LOG_ERR,
            self::INFO => LOG_INFO,
            self::DEBUG => LOG_DEBUG,
            self::NOTICE => LOG_NOTICE
        };
    }
}