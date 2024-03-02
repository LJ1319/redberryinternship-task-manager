<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id'     => User::first()->id,
			'name'        => [
				'en' => fake()->sentence(),
				'ka' => 'სახელი',
			],
			'description' => [
				'en' => fake()->paragraphs(3, true),
				'ka' => 'აღწერა',
			],
			'due_date'    => fake()->dateTime(),
		];
	}
}
