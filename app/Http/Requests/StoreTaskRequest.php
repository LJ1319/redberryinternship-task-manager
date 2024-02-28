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
			'name_en'        => 'required|min:3|regex:/^[a-zA-Z\s\d]+$/',
			'name_ka'        => 'required|min:3|regex:/^[ა-ჰ\s\d]+$/',
			'description_en' => 'required|min:3|regex:/^[a-zA-Z\s\d]+$/',
			'description_ka' => 'required|min:3|regex:/^[ა-ჰ\s\d]+$/',
			'due_date'       => 'required|date',
		];
	}
}
