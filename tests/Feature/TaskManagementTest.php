<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class TaskManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeder_populates_expected_records(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertSame(1, User::count());
        $this->assertGreaterThanOrEqual(8, Task::count());
        $this->assertGreaterThanOrEqual(3, Task::distinct('task_date')->count('task_date'));
        $this->assertGreaterThan(0, Task::forToday()->count());
    }

    public function test_welcome_page_displays_only_todays_tasks(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response->assertOk();
        $todayTasks = Task::forToday()->get();
        $otherTasks = Task::whereDate('task_date', '!=', Carbon::today())->get();

        foreach ($todayTasks as $task) {
            $response->assertSee($task->title);
        }

        foreach ($otherTasks as $task) {
            $response->assertDontSee($task->title);
        }
    }

    public function test_tasks_page_displays_all_tasks_ordered_by_date(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/tasks');

        $response->assertOk();
        $titlesInOrder = Task::orderedByDate()->pluck('title')->all();
        $response->assertSeeInOrder($titlesInOrder);
    }

    public function test_profile_page_displays_the_single_user_record(): void
    {
        $this->seed(DatabaseSeeder::class);
        $user = User::firstOrFail();

        $response = $this->get('/profile');

        $response->assertOk();
        $response->assertSee($user->full_name);
        $response->assertSee($user->username);
        $response->assertSee($user->email);
    }

    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/about');

        $response->assertOk();
        $response->assertSee('John James');
        $response->assertSee('IT0049');
    }
}
