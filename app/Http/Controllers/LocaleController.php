<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke($locale): RedirectResponse
	{
		app()->setLocale($locale);
		session()->put('locale', $locale);

		return redirect()->back();
	}
}
