<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
	public function setLocale($locale): RedirectResponse
	{
		if (isset($locale) && in_array($locale, config('app.available_locales'))) {
			app()->setLocale($locale);
			session()->put('locale', $locale);
		} else {
			$fallback = app()->getFallbackLocale();

			app()->setLocale($fallback);
			session()->put('locale', $fallback);
		}

		return redirect()->back();
	}
}
