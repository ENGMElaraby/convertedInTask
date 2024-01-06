<?php

namespace App\Http\Controllers;

use App\{Models\Statistics, Models\TaskModel};
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTaskPage()
    {
        $admins = User::where('is_admin', true)->get();
        $users = User::where('is_admin', false)->get();

        return view('create-task', compact('admins', 'users'));
    }

    public function createTask(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'admin_id' => 'required|exists:users,id,is_admin,1',
            'user_id' => 'required|exists:users,id,is_admin,0',
        ]);

        $task = TaskModel::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'assigned_to_id' => $validatedData['user_id'],
            'assigned_by_id' => $validatedData['admin_id'],
        ]);

        // Update Statistics table
        $userStatistics = Statistics::firstOrCreate(['user_id' => $validatedData['user_id']]);
        $userStatistics->increment('task_count');

        return redirect('/task-list');
    }

    public function taskList()
    {
        $tasks = TaskModel::paginate(10);
        return view('task-list', compact('tasks'));
    }

    public function statistics()
    {
        $topUsers = Statistics::orderBy('task_count', 'desc')->take(10)->get();
        return view('statistics', compact('topUsers'));
    }
}
