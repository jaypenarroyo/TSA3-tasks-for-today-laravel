<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display the Welcome page showing only today's tasks.
     */
    public function welcome(): View
    {
        $today = Carbon::today();
        $todayTasks = Task::forToday()
            ->orderBy('id', 'asc')
            ->get();

        $stats = [
            'total' => $todayTasks->count(),
            'pending' => $todayTasks->where('status', 'pending')->count(),
            'completed' => $todayTasks->where('status', 'completed')->count(),
        ];

        return view('welcome', [
            'todayDate' => $today,
            'todayTasks' => $todayTasks,
            'stats' => $stats,
        ]);
    }

    /**
     * Display the full Task List page ordered by task_date.
     */
    public function index(): View
    {
        $tasks = Task::orderedByDate()->get();
        $today = Carbon::today();

        $stats = [
            'total' => $tasks->count(),
            'pending' => $tasks->where('status', 'pending')->count(),
            'completed' => $tasks->where('status', 'completed')->count(),
            'today' => $tasks->filter(fn (Task $task) => $task->task_date->isSameDay($today))->count(),
        ];

        return view('tasks.index', [
            'tasks' => $tasks,
            'today' => $today,
            'stats' => $stats,
        ]);
    }

    /**
     * Toggle a task's status between pending and completed.
     */
    public function toggleStatus(Task $task): RedirectResponse
    {
        $task->status = $task->status === 'completed' ? 'pending' : 'completed';
        $task->save();

        return back()->with(
            'status',
            sprintf('Task "%s" marked as %s.', $task->title, $task->status)
        );
    }
}
