<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self active()
 * @method static self inactive()
 */
class Status extends Enum
{
    protected static function values(): array
    {
        return [
            'active' => 'Active',
            'inactive' => 'Inactive',
        ];
    }

    protected static function labels(): array
    {
        return [
            'active' => __('Active'),
            'inactive' => __('Inactive'),
        ];
    }

    public static function options(): array
    {
        return [
            self::active()->value => __('Active'),
            self::inactive()->value => __('Inactive'),
        ];
    }
}
