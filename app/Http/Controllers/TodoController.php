<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display all todos.
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Store a newly created todo.
     */
    public function store(StoreTodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect()->back()->with('success', 'Todo added successfully.');
    }

    /**
     * Mark a todo as completed.
     */
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);

        return redirect()->back();
    }

    /**
     * Mark a todo as incomplete again.
     */
    public function undo(Todo $todo)
    {
        $todo->update(['completed' => false]);

        return redirect()->back();
    }

    /**
     * Delete a completed todo.
     */
    public function destroy(Todo $todo)
    {
        if (! $todo->completed) {
            return redirect()->back();
        }

        $todo->delete();

        return redirect()->back()->with('success', 'Todo deleted successfully.');
    }
}
