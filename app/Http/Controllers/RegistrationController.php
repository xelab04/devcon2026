<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        if (! config('registration.open')) {
            return view('placeholder', [
                'title' => 'Register — MSCC DevCon 2026',
                'heading' => 'REGISTER',
                'subheading' => 'Registration opens in June',
                'message' => 'Registration will open on 13 June 2026.',
            ]);
        }

        return view('register', ['title' => 'Register — MSCC DevCon 2026']);
    }

    public function store(StoreRegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (Registration::query()->where('email', $data['email'])->exists()) {
            return redirect()
                ->route('register')
                ->withInput()
                ->with('warning', 'This email address has already been used. You are already registered for DevCon 2026.');
        }

        $registration = Registration::create($data);

        Mail::to($registration->email)->queue(new RegistrationConfirmationMail($registration));

        return redirect()
            ->route('register')
            ->with('success', 'Registration completed successfully — your details have been sent to your email.');
    }
}
