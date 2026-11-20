<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'status',
        'task_date',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'task_date' => 'date',
        ];
    }

    /**
     * Scope a query to only include tasks scheduled for today.
     */
    public function scopeForToday(Builder $query): Builder
    {
        return $query->whereDate('task_date', Carbon::today());
    }

    /**
     * Scope a query to order tasks chronologically by task_date.
     */
    public function scopeOrderedByDate(Builder $query): Builder
    {
        return $query->orderBy('task_date', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Scope a query to only include pending tasks.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include completed tasks.
     */
    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }
}
