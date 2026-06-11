<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CheckedInMail;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));

        $registrations = Registration::query()
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($inner) use ($search): void {
                    $inner->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('organisation', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.registrations.index', [
            'registrations' => $registrations,
            'search' => $search,
        ]);
    }

    public function checkIn(Registration $registration): RedirectResponse
    {
        if (! $registration->checked_in) {
            $registration->update([
                'checked_in' => true,
                'checked_in_at' => now(),
            ]);

            Mail::to($registration->email)->queue(new CheckedInMail($registration));
        }

        return back()->with('success', "{$registration->fullName()} has been checked in.");
    }

    public function cancelCheckIn(Registration $registration): RedirectResponse
    {
        if ($registration->checked_in) {
            $registration->update([
                'checked_in' => false,
                'checked_in_at' => null,
            ]);
        }

        return back()->with('warning', "Check-in for {$registration->fullName()} was undone.");
    }

    public function export(): StreamedResponse
    {
        Gate::authorize('export-registrations');

        $filename = 'devcon2026-registrations-'.now()->format('Y-m-d_His').'.csv';

        return response()->streamDownload(function (): void {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'ID', 'First name', 'Last name', 'Email', 'Phone', 'Gender', 'Affiliation',
                'Organisation', 'Job title', 'First time', 'Attending reason', 'Consent',
                'Checked in', 'Checked in at', 'Registered at',
            ]);

            Registration::query()->orderBy('id')->chunk(200, function ($chunk) use ($handle): void {
                foreach ($chunk as $registration) {
                    fputcsv($handle, [
                        $registration->id,
                        $registration->first_name,
                        $registration->last_name,
                        $registration->email,
                        $registration->phone,
                        $registration->gender->label(),
                        $registration->affiliation_type->label(),
                        $registration->organisation,
                        $registration->job_title,
                        $registration->first_time ? 'Yes' : 'No',
                        $registration->attending_reason?->map(fn ($r) => $r->label())->implode(', '),
                        $registration->consent ? 'Yes' : 'No',
                        $registration->checked_in ? 'Yes' : 'No',
                        $registration->checked_in_at?->format('Y-m-d H:i:s'),
                        $registration->created_at?->format('Y-m-d H:i:s'),
                    ]);
                }
            });

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
