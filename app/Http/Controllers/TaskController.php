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
			'user_id'     => auth()->id(),
			'name'        => $request->get('name'),
			'description' => $request->get('description'),
			'due_date'    => $request->get('due_date'),
		]);

		return redirect('/');
	}

	public function show(Task $task): View
	{
		return view('tasks.show', [
			'task' => $task,
		]);
	}

	public function deleteOld(): RedirectResponse
	{
		Task::where('due_date', '<', now())->delete();

		return redirect('/');
	}
}
