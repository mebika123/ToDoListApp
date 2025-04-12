<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()  {
        $tasks = Task::where('due_date',today())->limit(5)->get();
        $dashboardDatas = [
            'TotalTasks' => Task::count(),
            'TotalPendingTasks' => Task::where('status', 'pending')->count(),
            'TotalInProgressTasks' => Task::where('status', 'inProgress')->count(),
            'TotalCompletedTasks' => Task::where('status', 'completed')->count(),
        ];
        return view('index', compact('dashboardDatas','tasks'));
    }
}
