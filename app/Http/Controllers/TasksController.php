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

    public function add(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:task',
            'description'=>'required',
        ]);
        Task::create($validateData);
        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully'
            
        ]);
    }

    public function update(Request $request,$id){

        $params = [
            'name' => $request->name,
            'description' => $request->description,
           
        ];

        if (Task::where('id', $id)->update($params)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Task updated successfully'  
            ]);
        } else {
            return response()->json([
                'status' => 'filed',
                'message' => 'Task updated failed'
                
            ]);
        }
    }

    public function delete($id){
        Task::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully'
            
        ]);
    }

}
