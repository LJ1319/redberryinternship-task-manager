<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
	public function index(): View
	{
		return view('tasks.index', [
			'tasks' => Task::latest()
				->filter(request(['overdue']))
				->paginate(8)->withQueryString(),
		]);
	}

	public function deleteOld(): RedirectResponse
	{
		Task::where('due_date', '<', now())->delete();

		return redirect('/');
	}
}
