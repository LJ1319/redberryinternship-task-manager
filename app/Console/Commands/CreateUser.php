<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new user';

	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$prompts = [
			'email'    => $this->ask('Enter email'),
			'password' => $this->secret('Enter password'),
		];

		$validated = $this->validateArguments($prompts);

		User::create($validated);

		$this->info('User created successfully!');
	}

	protected function validateArguments(array $prompts): array
	{
		$validator = Validator::make($prompts, [
			'email'    => ['required', 'email', 'unique:users,email'],
			'password' => ['required', Password::min(4)],
		]);

		if ($validator->fails()) {
			$this->error('Whoops! The given arguments are invalid!');
			exit;
		}

		return $validator->validated();
	}
}
