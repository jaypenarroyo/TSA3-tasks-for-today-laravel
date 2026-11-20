# Tasks for Today Management System (Laravel)

**Course:** IT0049 — Web System Technologies  
**Assessment:** Technical Summative Assessment 3 (TSA3)  
**Developer:** John James (`jpenarroyo53@gmail.com`)

A Laravel rebuild of the TSA1 **Tasks for Today Management System** using Laravel migrations, database seeders, Eloquent ORM models with query scopes, MVC controllers, and Blade views.

---

## Features & Routes

| Route | Name | Controller Action | Description |
| :--- | :--- | :--- | :--- |
| `GET /` | `welcome` | `TaskController@welcome` | Displays **only** tasks where `task_date` is today, along with daily summary counts. |
| `GET /tasks` | `tasks.index` | `TaskController@index` | Displays **all** tasks ordered chronologically by `task_date`. |
| `PATCH /tasks/{task}/toggle` | `tasks.toggle` | `TaskController@toggleStatus` | Toggles a task between `pending` and `completed`. |
| `GET /profile` | `profile.show` | `ProfileController@show` | Displays the single user record from the `users` table. |
| `GET /about` | `about` | `PageController@about` | Static About page identifying the developer and project architecture. |

---

## Database Schema

### `users` Table
- `id` — Primary key (`BIGINT UNSIGNED`, auto-increment)
- `username` — `VARCHAR(255)`, **unique**
- `full_name` — `VARCHAR(255)`
- `email` — `VARCHAR(255)`, **unique**
- `created_at`, `updated_at` — Timestamps

### `tasks` Table
- `id` — Primary key (`BIGINT UNSIGNED`, auto-increment)
- `title` — `VARCHAR(255)`
- `status` — `VARCHAR(255)`, default `'pending'`
- `task_date` — `DATE`
- `created_at`, `updated_at` — Timestamps

### Seeded Data
- **`UserSeeder`**: Seeds **1** user record (`johnjames` / `John James`).
- **`TaskSeeder`**: Seeds **10** realistic tasks spanning **4** distinct dates (yesterday, today, tomorrow, and 3 days ahead), ensuring today's date always has tasks whenever the seeder runs.
- An optional MySQL dump is also included at `database/tasks_for_today.sql`.

---

## Prerequisites

- **PHP** `>= 8.2` (with `pdo_sqlite` or `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`)
- **Composer** `>= 2.x`
- **SQLite** (default, zero-config) or **MySQL / MariaDB** (e.g., XAMPP, Laragon, or Laravel Herd)

---

## Local Setup & Running the Project

### Option A: Quick Start with SQLite (Recommended)

```bash
# 1. Clone the repository
git clone https://github.com/<your-username>/tasks-for-today-laravel.git
cd tasks-for-today-laravel

# 2. Install PHP dependencies
composer install

# 3. Create your environment file and generate an application key
cp .env.example .env
php artisan key:generate

# 4. Create the SQLite database file
touch database/database.sqlite

# 5. Run migrations and seed the database
php artisan migrate --seed

# 6. Start the local development server
php artisan serve
```

Open **http://127.0.0.1:8000** in your browser.

### Option B: Setup with MySQL (XAMPP / Laragon)

1. Create a database named `tasks_for_today` in phpMyAdmin or MySQL.
2. Open `.env` and switch the database settings to MySQL:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tasks_for_today
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   php artisan serve
   ```
   *(Alternatively, you can import `database/tasks_for_today.sql` directly into MySQL.)*

---

## Running Tests

```bash
php artisan test
```

The feature test suite (`tests/Feature/TaskManagementTest.php`) verifies:
- Seeder populates 1 user and at least 8 tasks across 3+ dates including today.
- `/` displays only today's tasks.
- `/tasks` displays all tasks ordered by `task_date`.
- `/profile` displays the single user record.
- `/about` renders developer information.

---

## Project Structure

```text
├── app/
│   ├── Http/Controllers/
│   │   ├── PageController.php
│   │   ├── ProfileController.php
│   │   └── TaskController.php
│   ├── Models/
│   │   ├── Task.php
│   │   └── User.php
│   └── Providers/
│       └── AppServiceProvider.php
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   │   ├── 2026_01_01_000001_create_users_table.php
│   │   └── 2026_01_01_000002_create_tasks_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── TaskSeeder.php
│   │   └── UserSeeder.php
│   └── tasks_for_today.sql
├── public/
│   ├── css/app.css
│   ├── .htaccess
│   └── index.php
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── profile/show.blade.php
│   ├── tasks/index.blade.php
│   ├── about.blade.php
│   └── welcome.blade.php
├── routes/
│   ├── console.php
│   └── web.php
├── storage/
├── tests/Feature/TaskManagementTest.php
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

## References

- Stauffer, M. (2024). *Laravel: Up & Running: A Framework for Building Modern PHP Apps* (3rd ed.).
- Laravel Documentation — [Eloquent: Query Scopes](https://laravel.com/docs/13.x/eloquent#query-scopes)
