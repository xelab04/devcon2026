<?php

namespace App\Enums;

enum AttendingReason: string
{
    case AttendSessions = 'attend_sessions';
    case Network = 'network';
    case LookingForAJob = 'looking_for_a_job';

    public function label(): string
    {
        return match ($this) {
            self::AttendSessions => 'Attend sessions',
            self::Network => 'Network',
            self::LookingForAJob => 'Looking for a job',
        };
    }
}
