<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateUserRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function login(): View
	{
		$coverPhoto = asset('images/cover.jpeg');
		$path = Setting::where('title', 'cover_photo')->first()?->data['path'];

		if ($path) {
			$coverPhoto = asset("storage/$path");
		}

		return view('auth.login', [
			'coverPhoto' => $coverPhoto,
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
