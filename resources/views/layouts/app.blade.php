<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasks for Today') — Tasks for Today</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ route('welcome') }}" class="brand">
                <span class="brand-mark">T</span>
                <span>Tasks for Today</span>
            </a>

            <nav class="nav-links" aria-label="Primary Navigation">
                <a href="{{ route('welcome') }}"
                   class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
                    Today
                </a>
                <a href="{{ route('tasks.index') }}"
                   class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                    All Tasks
                </a>
                <a href="{{ route('profile.show') }}"
                   class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                    Profile
                </a>
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="container">
            @if (session('status'))
                <div class="flash-banner" role="status">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <span>IT0049 &middot; Technical Summative Assessment 3 (Laravel)</span>
            <span>Tasks for Today Management System</span>
        </div>
    </footer>
</body>
</html>
