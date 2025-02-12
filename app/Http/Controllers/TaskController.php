<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request, Project $project)
    {
        $categories = Category::all();

        $tasks = $project->tasks()->when($request->category_id, function ($query) use ($request) {
            return $query->where('category_id', $request->category_id);
        })->when($request->status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        })->get();

        return view('tasks', compact('tasks', 'project', 'categories'));
    }

    public function markAsCompleted(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->back();
    }
}
