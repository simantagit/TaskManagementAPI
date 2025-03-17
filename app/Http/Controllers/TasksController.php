<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function tasks(){
        $tasks = Task::get();

        return response()->json([
            'status' => 'success',
            'task' => $tasks,
        ]);
    }

}
