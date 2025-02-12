<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::query();

        if ($request->filled('due_date')) {
            $projects->where('due_date', $request->due_date);
        }

        $projects = $projects->get();

        return view('projects', compact('projects'));
    }
}