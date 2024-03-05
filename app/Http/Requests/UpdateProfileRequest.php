<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'password'      => ['nullable', Password::min(4)],
			'new_password'  => ['nullable', 'confirmed', Password::min(4)],
			'profile_photo' => ['nullable', 'image'],
			'cover_photo'   => ['nullable', 'image'],
		];
	}
}
