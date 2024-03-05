<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
	public function index(): View
	{
		$profilePhoto = auth()->user()->profile_photo ?? 'profile/profile.png';

		$setting = Setting::first() ? Setting::first() : Setting::create([
			'data' => ['cover_photo' => 'cover/cover.jpeg'],
		]);
		$coverPhoto = $setting->data['cover_photo'];

		return view('profile.index', [
			'user'         => auth()->user(),
			'profilePhoto' => $profilePhoto,
			'coverPhoto'   => $coverPhoto,
		]);
	}

	public function update(UpdateProfileRequest $request, User $user): RedirectResponse
	{
		$validated = $request->validated();

		if ($request->filled('new_password')) {
			if (!$request->filled('password')) {
				throw ValidationException::withMessages(['password' => __('messages.password_required')]);
			}

			$match = Hash::check($validated['password'], auth()->user()->getAuthPassword());
			if (!$match) {
				throw ValidationException::withMessages(['password' => __('messages.password_match')]);
			}

			$user->update([
				'password' => $validated['new_password'],
			]);
		}

		if ($request->hasFile('profile_photo')) {
			$profileFile = $request->file('profile_photo');
			$profilePhoto = Storage::putFileAs('profile', $profileFile, str_replace(' ', '-', $profileFile->getClientOriginalName()));

			$user->update([
				'profile_photo' => $profilePhoto ?? null,
			]);
		}

		if ($request->hasFile('cover_photo')) {
			$setting = Setting::first();

			$coverFile = $request->file('cover_photo');
			$coverPhoto = Storage::putFileAs('cover', $coverFile, str_replace(' ', '-', $coverFile->getClientOriginalName()));

			$setting['data'] = ['cover_photo' => $coverPhoto];
			$setting->save();
		}

		return redirect()->route('dashboard', )->with('success', 'profile_updated');
	}
}
