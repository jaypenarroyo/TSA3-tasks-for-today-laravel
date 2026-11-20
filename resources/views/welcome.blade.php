@extends('layouts.app')

@section('title', "Today's Tasks")

@section('content')
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Welcome</p>
            <h1 class="page-title">Tasks for Today</h1>
            <p class="page-subtitle">
                Showing only tasks scheduled for {{ $todayDate->format('l, F j, Y') }}.
            </p>
        </div>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">View All Tasks</a>
    </div>

    <section class="stats-grid" aria-label="Today's Task Summary">
        <div class="stat-card">
            <p class="stat-label">Scheduled Today</p>
            <p class="stat-value">{{ $stats['total'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Pending</p>
            <p class="stat-value">{{ $stats['pending'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Completed</p>
            <p class="stat-value">{{ $stats['completed'] }}</p>
        </div>
    </section>

    <section class="card">
        <div class="card-header">
            <h2 class="card-title">Today's Agenda ({{ $todayDate->toDateString() }})</h2>
            <span class="task-meta">{{ $stats['total'] }} {{ \Illuminate\Support\Str::plural('task', $stats['total']) }}</span>
        </div>

        @if ($todayTasks->isEmpty())
            <div class="empty-state">
                <p>No tasks are scheduled for today.</p>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline">Browse Full Task List</a>
            </div>
        @else
            <ul class="task-list">
                @foreach ($todayTasks as $task)
                    <li class="task-item">
                        <div class="task-info">
                            <span class="task-title {{ $task->status === 'completed' ? 'is-completed' : '' }}">
                                {{ $task->title }}
                            </span>
                            <span class="task-meta">
                                Due {{ $task->task_date->format('F j, Y') }}
                            </span>
                        </div>

                        <div class="task-actions">
                            <span class="badge {{ $task->status === 'completed' ? 'badge-completed' : 'badge-pending' }}">
                                {{ $task->status }}
                            </span>
                            <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline">
                                    {{ $task->status === 'completed' ? 'Mark Pending' : 'Mark Done' }}
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
@endsection
