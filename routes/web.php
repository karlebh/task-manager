<?php

use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{user}/task-dashboard', function (User $user) {
    return view('task.dashboard')->with(['user' => $user]);
})->name('task.dashboard');


Route::get('/{user}/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/{user}/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/{user}/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/{user}/task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::get('/{user}/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::patch('/{user}/task/{task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/{user}/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
