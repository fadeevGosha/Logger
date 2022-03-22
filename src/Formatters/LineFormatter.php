<?php

namespace App\Formatters;

use App\Enums\LineFormatterAttributes;
use App\Enums\LoggerLevelCode;

class LineFormatter implements LineFormatterInterface
{
    public const DEFAULT_LINE = '%date%  [%level_code%]  [%level%]  %message%';
    public const DATE_FORMAT = 'Y-m-d H:i:s';

    public function __construct(
        private ?string $line = null,
        private ?string $dateFormat = null

    ) {
    }

    /**
     * @throws \Exception
     */
    public function getLine(
        LoggerLevelCode $levelCode,
        string $message
    ): string {
        $line = $this->line ?? static::DEFAULT_LINE;
        $dateTimeFormat = $this->dateFormat ?? self::DATE_FORMAT;

        return str_replace(
            LineFormatterAttributes::getAttributesValue(),
            [
                date($dateTimeFormat),
                LoggerLevelCode::getCodeByLevel($levelCode),
                $levelCode->name,
                $message
            ],
            $line
        );
    }

}