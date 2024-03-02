<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
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

		return redirect()->route('dashboard')->with('success', 'task_created');
	}

	public function show(Task $task): View
	{
		return view('tasks.show', [
			'task' => $task,
		]);
	}

	public function edit(Task $task): View
	{
		return view('tasks.edit', [
			'task' => $task,
		]);
	}

	public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
	{
		$task->update($request->validated());
		return redirect()->route('tasks.show', $task)->with('success', 'task_updated');
	}

	public function destroy(?Task $task = null): RedirectResponse
	{
		if (!$task) {
			$old_tasks = Task::where('due_date', '<', now());

			if ($old_tasks->count() > 0) {
				$old_tasks->delete();
				return redirect()->route('dashboard')->with('success', 'old_tasks_deleted');
			}

			return redirect()->route('dashboard');
		}

		$task->delete();
		return redirect()->route('dashboard')->with('success', 'task_deleted');
	}
}
