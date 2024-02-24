<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function authenticate(AuthenticateUserRequest $request): RedirectResponse
	{
		$credentials = $request->validated();

		if (!Auth::attempt($credentials)) {
			return back()->withErrors([
				'credentials' => 'The provided credentials do not match our records.',
			])->onlyInput('email');
		}

		$request->session()->regenerate();

		return redirect()->intended();
	}
}
