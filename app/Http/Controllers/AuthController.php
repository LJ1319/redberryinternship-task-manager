<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateUserRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login()
	{
		$cover = Setting::first()->data['cover_photo'] ?? 'cover/cover.jpeg';

		return view('auth.login', [
			'cover' => $cover,
		]);
	}

	public function authenticate(AuthenticateUserRequest $request): RedirectResponse
	{
		$credentials = $request->validated();

		if (!Auth::attempt($credentials)) {
			return back()->withErrors([
				'credentials' => __('auth.failed'),
			])->onlyInput('email');
		}

		$request->session()->regenerate();

		return redirect()->intended();
	}

	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('dashboard');
	}
}
