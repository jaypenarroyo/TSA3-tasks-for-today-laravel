@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Full Schedule</p>
            <h1 class="page-title">All Tasks</h1>
            <p class="page-subtitle">
                Every task in the database, ordered chronologically by date.
            </p>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-outline">Back to Today</a>
    </div>

    <section class="stats-grid" aria-label="Overall Task Summary">
        <div class="stat-card">
            <p class="stat-label">Total Tasks</p>
            <p class="stat-value">{{ $stats['total'] }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Due Today</p>
            <p class="stat-value">{{ $stats['today'] }}</p>
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
            <h2 class="card-title">Complete Task List</h2>
            <span class="task-meta">Ordered by task_date (ascending)</span>
        </div>

        @if ($tasks->isEmpty())
            <div class="empty-state">
                <p>No tasks found. Run <code>php artisan db:seed</code> to populate sample tasks.</p>
            </div>
        @else
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="task-title {{ $task->status === 'completed' ? 'is-completed' : '' }}">
                                        {{ $task->title }}
                                    </span>
                                </td>
                                <td>
                                    {{ $task->task_date->format('M j, Y') }}
                                    @if ($task->task_date->isSameDay($today))
                                        <span class="badge badge-today">Today</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $task->status === 'completed' ? 'badge-completed' : 'badge-pending' }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline">
                                            {{ $task->status === 'completed' ? 'Reopen' : 'Complete' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
