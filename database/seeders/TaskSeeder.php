<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Seed at least 8 realistic tasks spanning at least 3 dates, including today.
     */
    public function run(): void
    {
        Task::query()->delete();

        $yesterday = Carbon::yesterday()->toDateString();
        $today = Carbon::today()->toDateString();
        $tomorrow = Carbon::tomorrow()->toDateString();
        $nextWeek = Carbon::today()->addDays(3)->toDateString();

        $tasks = [
            // Yesterday (2 tasks)
            [
                'title' => 'Set up Laravel project skeleton and environment configuration',
                'status' => 'completed',
                'task_date' => $yesterday,
            ],
            [
                'title' => 'Draft ER diagram and migration schema for users and tasks tables',
                'status' => 'completed',
                'task_date' => $yesterday,
            ],

            // Today (4 tasks — displayed on the Welcome page "/")
            [
                'title' => 'Implement Task and User Eloquent models with date query scopes',
                'status' => 'completed',
                'task_date' => $today,
            ],
            [
                'title' => 'Review Welcome page filtering to show only tasks due today',
                'status' => 'pending',
                'task_date' => $today,
            ],
            [
                'title' => 'Verify chronological ordering on the full Task List page',
                'status' => 'pending',
                'task_date' => $today,
            ],
            [
                'title' => 'Update developer bio and project details on the About page',
                'status' => 'pending',
                'task_date' => $today,
            ],

            // Tomorrow (2 tasks)
            [
                'title' => 'Run PHPUnit feature tests across all four application routes',
                'status' => 'pending',
                'task_date' => $tomorrow,
            ],
            [
                'title' => 'Write setup and deployment instructions in README.md',
                'status' => 'pending',
                'task_date' => $tomorrow,
            ],

            // 3 days from today (2 tasks)
            [
                'title' => 'Deploy Laravel application to live hosting environment',
                'status' => 'pending',
                'task_date' => $nextWeek,
            ],
            [
                'title' => 'Submit GitHub repository link and live hosted URL for IT0049 TSA3',
                'status' => 'pending',
                'task_date' => $nextWeek,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
