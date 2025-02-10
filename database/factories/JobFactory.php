<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::factory(),
			'title' => $this->faker->jobTitle(255),
			'description' => $this->faker->paragraphs(2, true),
			'salary' => $this->faker->numberBetween(40000, 120000),
			'tags' => implode(', ', $this->faker->words(3)),
			'job_type' => $this->faker->randomElement(['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Intership', 'Volunteer', 'On-Call']),
			'remote' => $this->faker->boolean(),
			'requirements' => $this->faker->sentences(3, true),
			'benefits' => $this->faker->sentences(2, true),
			'address' => $this->faker->streetAddress(),
			'city' => $this->faker->city(),
			'state' => $this->faker->state(),
			'zipcode' => $this->faker->postcode(),
			'contact_email' => $this->faker->safeEmail(255),
			'contact_phone' => $this->faker->phoneNumber(255),
			'company_name' => $this->faker->company(255),
			'company_description' => $this->faker->paragraphs(2, true),
			'company_logo' => $this->faker->imageUrl(100, 100, 'business', true, 'logo'),
			'company_website' => $this->faker->url(),
		];
	}
}
