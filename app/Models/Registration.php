<?php

namespace App\Models;

use App\Enums\AffiliationType;
use App\Enums\AttendingReason;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'affiliation_type',
        'organisation',
        'job_title',
        'first_time',
        'attending_reason',
        'consent',
        'checked_in',
        'checked_in_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
            'affiliation_type' => AffiliationType::class,
            'attending_reason' => \Illuminate\Database\Eloquent\Casts\AsEnumCollection::class.':'.AttendingReason::class,
            'first_time' => 'boolean',
            'consent' => 'boolean',
            'checked_in' => 'boolean',
            'checked_in_at' => 'datetime',
        ];
    }

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function checkInUrl(): string
    {
        return "https://conference.mscc.mu/checkin/{$this->id}";
    }
}
