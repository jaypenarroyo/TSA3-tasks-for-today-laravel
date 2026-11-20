<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the single user profile record.
     */
    public function show(): View
    {
        $user = User::first();

        $taskSummary = [
            'total' => Task::count(),
            'today' => Task::forToday()->count(),
            'completed' => Task::completed()->count(),
            'pending' => Task::pending()->count(),
        ];

        return view('profile.show', [
            'user' => $user,
            'taskSummary' => $taskSummary,
        ]);
    }
}
