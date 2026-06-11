<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AttendingReason;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total = Registration::query()->count();
        $checkedIn = Registration::query()->where('checked_in', true)->count();
        $pending = $total - $checkedIn;
        $firstTimers = Registration::query()->where('first_time', true)->count();
        $rate = $total > 0 ? (int) round($checkedIn / $total * 100) : 0;

        $byDay = Registration::query()
            ->whereNotNull('checked_in_at')
            ->get(['checked_in_at'])
            ->groupBy(fn (Registration $registration): string => $registration->checked_in_at->toDateString())
            ->map(fn ($group) => $group->count())
            ->sortKeys();

        $reasons = [];
        foreach (AttendingReason::cases() as $reason) {
            $reasons[$reason->label()] = Registration::query()->whereJsonContains('attending_reason', $reason->value)->count();
        }

        return view('admin.dashboard', [
            'total' => $total,
            'checkedIn' => $checkedIn,
            'pending' => $pending,
            'firstTimers' => $firstTimers,
            'rate' => $rate,
            'genderData' => [
                'Male' => Registration::query()->where('gender', 'M')->count(),
                'Female' => Registration::query()->where('gender', 'F')->count(),
            ],
            'affiliationData' => [
                'Professional' => Registration::query()->where('affiliation_type', 'professional')->count(),
                'Student' => Registration::query()->where('affiliation_type', 'student')->count(),
            ],
            'checkInsByDayLabels' => $byDay->keys()->map(fn (string $date): string => Carbon::parse($date)->format('d M'))->values(),
            'checkInsByDayData' => $byDay->values(),
            'reasonData' => $reasons,
        ]);
    }
}
