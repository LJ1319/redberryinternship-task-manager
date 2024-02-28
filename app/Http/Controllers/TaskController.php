<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
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

	public function store(StoreTaskRequest $request): RedirectResponse
	{
		Task::create([
			'user_id' => auth()->id(),
			'name'    => [
				'en' => $request->get('name_en'),
				'ka' => $request->get('name_ka'),
			],
			'description' => [
				'en' => $request->get('description_en'),
				'ka' => $request->get('description_ka'),
			],
			'due_date' => $request->get('due_date'),
		]);

		return redirect('/');
	}

	public function deleteOld(): RedirectResponse
	{
		Task::where('due_date', '<', now())->delete();

		return redirect('/');
	}
}
