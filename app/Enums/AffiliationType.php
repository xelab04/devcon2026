<?php

namespace App\Enums;

enum AffiliationType: string
{
    case Professional = 'professional';
    case Student = 'student';

    public function label(): string
    {
        return match ($this) {
            self::Professional => 'Professional',
            self::Student => 'Student',
        };
    }
}
