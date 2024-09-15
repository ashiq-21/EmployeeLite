<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Copy the sample image to the public storage path
        $photoPath = 'samples/1726335674.jpg';
        $publicPath = 'photos/' . time() . '.jpg';

        // Store the photo in the public directory, simulating an upload
        Storage::disk('public')->put($publicPath, file_get_contents(base_path($photoPath)));

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'full_name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'photo' => $publicPath, // Use the copied photo path
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
