@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Account</p>
            <h1 class="page-title">User Profile</h1>
            <p class="page-subtitle">
                Displaying the single user record stored in the <code>users</code> table via Eloquent.
            </p>
        </div>
    </div>

    @if ($user)
        <section class="card">
            <div class="profile-banner">
                <div class="avatar-circle" aria-hidden="true">{{ $user->initials }}</div>
                <div>
                    <h2 class="card-title" style="font-size: 1.3rem;">{{ $user->full_name }}</h2>
                    <p class="page-subtitle" style="margin-top: 0.15rem;">&#64;{{ $user->username }}</p>
                </div>
            </div>

            <div class="card-body">
                <dl class="detail-list">
                    <div class="detail-item">
                        <dt>Username</dt>
                        <dd>{{ $user->username }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Full Name</dt>
                        <dd>{{ $user->full_name }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Email Address</dt>
                        <dd>{{ $user->email }}</dd>
                    </div>
                    <div class="detail-item">
                        <dt>Record ID</dt>
                        <dd>#{{ $user->id }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        <section class="stats-grid" style="margin-top: 1.5rem;" aria-label="User Task Overview">
            <div class="stat-card">
                <p class="stat-label">Total Tasks</p>
                <p class="stat-value">{{ $taskSummary['total'] }}</p>
            </div>
            <div class="stat-card">
                <p class="stat-label">Tasks Today</p>
                <p class="stat-value">{{ $taskSummary['today'] }}</p>
            </div>
            <div class="stat-card">
                <p class="stat-label">Pending</p>
                <p class="stat-value">{{ $taskSummary['pending'] }}</p>
            </div>
            <div class="stat-card">
                <p class="stat-label">Completed</p>
                <p class="stat-value">{{ $taskSummary['completed'] }}</p>
            </div>
        </section>
    @else
        <section class="card">
            <div class="empty-state">
                <p>No user record found. Run <code>php artisan db:seed</code> to seed the profile.</p>
            </div>
        </section>
    @endif
@endsection
