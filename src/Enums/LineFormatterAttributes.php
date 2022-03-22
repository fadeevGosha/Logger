<?php

namespace App\Enums;

enum LineFormatterAttributes: string
{
    case DATE = '%date%';
    case LEVEL_CODE = '%level_code%';
    case LEVEL = '%level%';
    case MESSAGE = '%message%';

    public const LINE_FORMATTER_ATTRIBUTES =
        [
            self::DATE,
            self::LEVEL_CODE,
            self::LEVEL,
            self::MESSAGE
        ];

    public static function getAttributesValue(): array
    {
        return array_map(
            fn(LineFormatterAttributes $attribute) => $attribute->value,
            self::LINE_FORMATTER_ATTRIBUTES
        );
    }
}