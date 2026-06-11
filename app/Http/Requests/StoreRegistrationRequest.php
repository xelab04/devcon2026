<?php

namespace App\Http\Requests;

use App\Enums\AffiliationType;
use App\Enums\AttendingReason;
use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) config('registration.open');
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'gender' => ['required', Rule::enum(Gender::class)],
            'affiliation_type' => ['required', Rule::enum(AffiliationType::class)],
            'organisation' => ['required', 'string', 'max:150'],
            'job_title' => ['required', 'string', 'max:150'],
            'first_time' => ['required', 'boolean'],
            'attending_reason' => ['required', 'array', 'min:1'],
            'attending_reason.*' => [Rule::enum(AttendingReason::class)],
            'consent' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'gender.required' => 'Please select your gender.',
            'affiliation_type.required' => 'Please select your affiliation type.',
            'first_time.required' => 'Please tell us whether this is your first time attending.',
            'attending_reason.required' => 'Please select at least one reason for attending.',
            'attending_reason.array' => 'Please select at least one reason for attending.',
            'attending_reason.min' => 'Please select at least one reason for attending.',
            'consent.accepted' => 'You must agree to the data usage statement to register.',
        ];
    }
}
