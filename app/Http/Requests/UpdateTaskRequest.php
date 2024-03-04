<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name.en'        => 'required|min:3|regex:/^[a-zA-Z\s\d\p{P}]+$/',
			'name.ka'        => 'required|min:3|regex:/^[ა-ჰ\s\d\p{P}]+$/',
			'description.en' => 'required|min:3|regex:/^[a-zA-Z\s\d\p{P}]+$/',
			'description.ka' => 'required|min:3|regex:/^[ა-ჰ\s\d\p{P}]+$/',
			'due_date'       => 'required|date',
		];
	}
}
