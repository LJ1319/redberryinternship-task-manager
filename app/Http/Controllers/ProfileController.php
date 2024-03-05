<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
	public function index(): View
	{
		$profilePhoto = auth()->user()->profile_photo ?? 'profile/profile.png';

		$setting = Setting::firstOrCreate(
			['title' => 'cover'],
			['data' => ['path' => 'cover/cover.jpeg']]
		);
		$coverPhoto = $setting->data['path'];

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
			$match = Hash::check($validated['password'], auth()->user()->getAuthPassword());

			if (!$match) {
				throw ValidationException::withMessages([
					'password' => __(
						'validation.same',
						[
							'attribute' => __('validation.attributes.password'),
							'other'     => __('validation.attributes.current_password'),
						]
					)]);
			}

			$user->update([
				'password' => $validated['new_password'],
			]);
		}

		if ($request->hasFile('profile_photo')) {
			$profilePhoto = $request->file('profile_photo')->store('profile');

			$user->update([
				'profile_photo' => $profilePhoto ?? null,
			]);
		}

		if ($request->hasFile('cover_photo')) {
			$coverPhoto = $request->file('cover_photo')->store('cover');

			Setting::updateOrCreate(
				['title' => 'cover'],
				['data' => ['path' => $coverPhoto]]
			);
		}

		return redirect()->route('dashboard', )->with('success', 'profile_updated');
	}
}
