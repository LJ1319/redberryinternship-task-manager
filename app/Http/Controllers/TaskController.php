<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
	public function index()
	{
		return view('tasks.index', [
			'tasks' => Task::latest()->paginate(8),
		]);
	}
}
