<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OverdueController extends Controller
{
	public function index(): View
	{
		return view('overdues.index', [
			'overdues' => Task::where('due_date', '<', now())->paginate(8),
		]);
	}

	public function destroy(): RedirectResponse
	{
		Task::where('due_date', '<', now())->delete();

		return redirect('/');
	}
}
