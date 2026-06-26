# Todo Application

A simple, minimal Laravel todo list application with create, complete, undo, and delete functionality.

## Features

- ✅ Add new todos
- ✅ Mark todos as completed
- ✅ Undo completed todos
- ✅ Delete todos
- ✅ Clean, responsive UI
- ✅ SQLite database

## Prerequisites

Before running the project, ensure you have the following installed:

- **PHP 8.0+** — Check with `php --version`
- **Composer** — PHP dependency manager [Install here](https://getcomposer.org)
- **Git** — Version control [Install here](https://git-scm.com)

## Installation & Setup

### Step 1: Clone or navigate to the project

```bash
cd /path/to/todoApp
```

### Step 2: Install PHP dependencies

```bash
composer install
```

This will install Laravel and all required packages.

### Step 3: Create environment file

```bash
cp .env.example .env
```

### Step 4: Generate application key

```bash
php artisan key:generate
```

This generates a unique encryption key for the application.

### Step 5: Create the SQLite database

The database file is already configured in `.env`:

```bash
touch database/database.sqlite
```

### Step 6: Run database migrations

```bash
php artisan migrate
```

This creates the `todos` table in SQLite.

## Running the Application

### Start the development server

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

You should see:
```
INFO  Server running on [http://0.0.0.0:8000].
```

### Access the application

Open your browser and navigate to:

```
http://127.0.0.1:8000
```

or

```
http://localhost:8000
```

### Stop the server

Press `Ctrl+C` in the terminal where the server is running.

## Usage

1. **Add a todo**: Type your task in the input field and click "Add"
2. **Complete a todo**: Click the "Complete" button next to an active todo
3. **Undo a completion**: Click "Undo" on a completed todo
4. **Delete a todo**: Click "Delete" on a completed todo

## Project Structure

```
todoApp/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── TodoController.php
│   │   └── Requests/
│   │       └── StoreTodoRequest.php
│   └── Models/
│       └── Todo.php
├── database/
│   ├── database.sqlite
│   └── migrations/
│       └── 2026_06_26_163754_create_todos_table.php
├── resources/
│   └── views/
│       └── todos/
│           └── index.blade.php
├── routes/
│   └── web.php
└── .env
```

## Available Routes

| Method | Route | Action |
|--------|-------|--------|
| GET | `/` | List all todos |
| POST | `/todos` | Create a new todo |
| PATCH | `/todos/{todo}/complete` | Mark as completed |
| PATCH | `/todos/{todo}/undo` | Mark as incomplete |
| DELETE | `/todos/{todo}` | Delete a todo |

## Troubleshooting

### Port 8000 already in use

If port 8000 is already in use, specify a different port:

```bash
php artisan serve --host=0.0.0.0 --port=8001
```

### Database not found

If you get a database error, ensure the SQLite file exists:

```bash
touch database/database.sqlite
php artisan migrate
```

### Composer command not found

If `composer` is not recognized, install Composer or use the full path:

```bash
php composer.phar install
```

## Development Notes

- **Database**: SQLite is used by default (file-based, no setup needed)
- **Framework**: Laravel 11+
- **Language**: PHP 8.5+
- **UI**: Minimal CSS (no external CSS frameworks required)

## License

This project is open source and available under the MIT License.
# ToDoPHP
