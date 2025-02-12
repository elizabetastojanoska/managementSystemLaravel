@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>

        <!-- Display filter form for projects -->
        <form method="GET" action="{{ route('projects.index') }}">
            <div class="mb-3">
                <label for="due_date" class="form-label">Filter by Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ request('due_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter Projects</button>
        </form>

        <!-- Display all projects -->
        <div class="mt-4">
            <ul>
                @forelse($projects as $project)
                    <li>
                        <a href="{{ route('tasks.index', $project->id) }}">
                            {{ $project->name }}
                        </a>
                    </li>
                @empty
                    <p>No projects available.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
