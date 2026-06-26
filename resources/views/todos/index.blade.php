<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #243447;
            margin: 0;
            padding: 40px 16px;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 24px;
        }
        h1 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 1.8rem;
        }
        .subtitle {
            color: #6b7280;
            margin-bottom: 20px;
        }
        .message {
            padding: 10px 12px;
            border-radius: 10px;
            background: #ecfdf3;
            color: #166534;
            margin-bottom: 16px;
        }
        form.inline-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
        }
        button {
            border: none;
            border-radius: 10px;
            padding: 10px 14px;
            cursor: pointer;
            font-weight: 600;
        }
        .btn-primary { background: #2563eb; color: white; }
        .btn-secondary { background: #e5e7eb; color: #111827; }
        .btn-danger { background: #fee2e2; color: #991b1b; }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eef2f7;
            gap: 12px;
        }
        .todo-text {
            font-size: 1rem;
        }
        .completed {
            text-decoration: line-through;
            color: #9ca3af;
        }
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .empty {
            color: #6b7280;
            padding: 12px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <p class="subtitle">Keep track of your tasks with a simple, clean interface.</p>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('todos.store') }}" method="POST" class="inline-form">
            @csrf
            <input type="text" name="title" placeholder="Add a new todo" required>
            <button type="submit" class="btn-primary">Add</button>
        </form>

        <ul>
            @forelse ($todos as $todo)
                <li>
                    <span class="todo-text {{ $todo->completed ? 'completed' : '' }}">{{ $todo->title }}</span>
                    <div class="actions">
                        @if (! $todo->completed)
                            <form action="{{ route('todos.complete', $todo) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-secondary">Complete</button>
                            </form>
                        @else
                            <form action="{{ route('todos.undo', $todo) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-secondary">Undo</button>
                            </form>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                </li>
            @empty
                <li class="empty">No todos yet.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
