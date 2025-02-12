@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks for Project: {{ $project->name }}</h1>

        <!-- Task filter form -->
        <form method="GET" action="{{ route('tasks.index', $project->id) }}">
            <div class="row">
                <div class="col">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter Tasks</button>
                </div>
            </div>
        </form>

        <!-- Display tasks -->
        <div class="mt-4">
            @forelse($tasks as $task)
                <div class="task-item">
                    <h4>{{ $task->title }}</h4>
                    <p>{{ $task->description }}</p>
                    <p>Status: {{ $task->status }}</p>
                    <p>Due Date: {{ $task->due_date }}</p>

                    @if($task->status != 'completed')
                        <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Mark as Completed</button>
                        </form>
                    @endif
                </div>
                <hr>
            @empty
                <p>No tasks available.</p>
            @endforelse
        </div>
    </div>
@endsection