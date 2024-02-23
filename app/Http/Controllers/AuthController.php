<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function login(): View
	{
		return view('auth.login');
	}

	public function auth(Request $request)
	{
		$validated = $request->validate([
			'email'    => 'required',
			'password' => 'required',
		]);

		if (!auth()->attempt($validated)) {
			throw ValidationException::withMessages([
				'email' => 'Your provided credentials are invalid.',
			]);
		}

		session()->regenerate();

		return redirect('/')->with('success', 'Welcome Back!');
	}
}
