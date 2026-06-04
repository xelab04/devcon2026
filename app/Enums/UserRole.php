<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Squad = 'squad';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Squad => 'Squad',
        };
    }
}
