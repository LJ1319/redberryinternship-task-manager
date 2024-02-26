<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
	public function index(): View
	{
		return view('tasks.index', [
			'tasks' => Task::latest()->paginate(8),
		]);
	}
}
