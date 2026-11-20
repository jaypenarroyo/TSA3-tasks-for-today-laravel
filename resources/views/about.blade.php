@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="page-header">
        <div>
            <p class="page-eyebrow">About the Project</p>
            <h1 class="page-title">Tasks for Today Management System</h1>
            <p class="page-subtitle">
                IT0049 (Web System Technologies) &mdash; Technical Summative Assessment 3
            </p>
        </div>
    </div>

    <section class="card">
        <div class="card-header">
            <h2 class="card-title">Developer Information</h2>
        </div>
        <div class="card-body">
            <dl class="detail-list">
                <div class="detail-item">
                    <dt>Developer</dt>
                    <dd>John James</dd>
                </div>
                <div class="detail-item">
                    <dt>Email</dt>
                    <dd>jpenarroyo53@gmail.com</dd>
                </div>
                <div class="detail-item">
                    <dt>Course</dt>
                    <dd>IT0049 &mdash; Web System Technologies</dd>
                </div>
                <div class="detail-item">
                    <dt>Assessment</dt>
                    <dd>Technical Summative Assessment 3 (Laravel)</dd>
                </div>
            </dl>
        </div>
    </section>

    <div class="about-grid">
        <section class="card">
            <div class="card-header">
                <h2 class="card-title">Project Overview</h2>
            </div>
            <div class="card-body">
                <p style="margin-top: 0; color: var(--text-muted);">
                    This application rebuilds the TSA1 Tasks for Today Management System in Laravel
                    using database migrations, seeders, Eloquent ORM models with query scopes,
                    dedicated controllers, and reusable Blade templates.
                </p>
            </div>
        </section>

        <section class="card">
            <div class="card-header">
                <h2 class="card-title">Key Architecture</h2>
            </div>
            <div class="card-body">
                <ul class="feature-list">
                    <li><strong>Migrations:</strong> Defines <code>tasks</code> and <code>users</code> schemas.</li>
                    <li><strong>Seeders:</strong> Populates 10 tasks across 4 dates (including today) and 1 user record.</li>
                    <li><strong>Eloquent Models:</strong> <code>Task</code> (with <code>forToday</code> and <code>orderedByDate</code> scopes) and <code>User</code>.</li>
                    <li><strong>Blade Views:</strong> Welcome (<code>/</code>), Task List (<code>/tasks</code>), Profile (<code>/profile</code>), and About (<code>/about</code>).</li>
                </ul>
            </div>
        </section>
    </div>
@endsection
