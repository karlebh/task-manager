<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index(User $user)
    {
        $tasks = Task::where('user_id', $user->id)->latest()->paginate(20);

        return view('task.index')->with([
            'tasks' => $tasks,
            'user' => $user,
        ]);
    }

    public function create(User $user)
    {
        return view('task.create')->with(['user' => $user]);
    }

    public function store(CreateTaskRequest $request, User $user)
    {
        $task = Task::create(array_merge($request->validated(), ['user_id' => $user->id]));

        return redirect()->route('task.show', [$user, $task])->with([
            'user' => $user,
            'message' => 'Task was successfully created!',
        ]);
    }

    public function show(User $user, Task $task)
    {
        if ($task->user->id !== $user->id) {
            return redirect()->route('task.index', $user);
        }

        return view('task.show')->with([
            'task' => $task,
            'user' => $user,
        ]);
    }

    public function edit(User $user, Task $task)
    {
        if ($task->user->id !== $user->id) {
            return redirect()->route('task.index', $user);
        }

        return view('task.edit')->with([
            'task' => $task,
            'user' => $user,
        ]);
    }

    public function update(UpdateTaskRequest $request, User $user, Task $task)
    {
        $task->update(array_merge($request->validated(), ['user_id' => $user->id]));

        return redirect()->route('task.show', [$user, $task])->with([
            'task' => $task,
            'message' => 'Task was successfully updated!',
        ]);
    }

    public function destroy(User $user, Task $task)
    {
        $task->delete();

        return redirect()->route('task.index', $user)->with([
            'message' => 'Task was successfully deleted!',
        ]);
    }
}
