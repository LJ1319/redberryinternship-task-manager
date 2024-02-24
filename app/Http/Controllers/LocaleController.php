<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
	public function setLocale($locale): RedirectResponse
	{
		if (!array_key_exists($locale, config('app.available_locales'))) {
			$fallback = app()->getFallbackLocale();
			app()->setLocale($fallback);
		}

		app()->setLocale($locale);

		session()->put('locale', $locale);

		return redirect()->back();
	}
}
