<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name.en'        => 'required|min:3|regex:/^[a-zA-Z\s\d]+$/',
			'name.ka'        => 'required|min:3|regex:/^[ა-ჰ\s\d]+$/',
			'description.en' => 'required|min:3|regex:/^[a-zA-Z\s\d]+$/',
			'description.ka' => 'required|min:3|regex:/^[ა-ჰ\s\d]+$/',
			'due_date'       => 'required|date',
		];
	}
}
