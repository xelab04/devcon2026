<?php

namespace Database\Factories;

use App\Enums\AffiliationType;
use App\Enums\AttendingReason;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkedIn = fake()->boolean(40);

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('+230 5### ####'),
            'gender' => fake()->randomElement(Gender::cases()),
            'affiliation_type' => fake()->randomElement(AffiliationType::cases()),
            'organisation' => fake()->company(),
            'job_title' => fake()->jobTitle(),
            'first_time' => fake()->boolean(),
            'attending_reason' => fake()->randomElements(AttendingReason::cases(), fake()->numberBetween(1, count(AttendingReason::cases()))),
            'consent' => true,
            'checked_in' => $checkedIn,
            'checked_in_at' => $checkedIn ? fake()->dateTimeBetween('-3 days', 'now') : null,
        ];
    }

    /**
     * Indicate that the registration has been checked in.
     */
    public function checkedIn(): static
    {
        return $this->state(fn (array $attributes): array => [
            'checked_in' => true,
            'checked_in_at' => fake()->dateTimeBetween('-3 days', 'now'),
        ]);
    }

    /**
     * Indicate that the registration has not been checked in.
     */
    public function notCheckedIn(): static
    {
        return $this->state(fn (array $attributes): array => [
            'checked_in' => false,
            'checked_in_at' => null,
        ]);
    }
}
