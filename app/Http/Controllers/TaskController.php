<?php

namespace App\Http\Controllers;
use App\Task;
use App\Repositories\TaskRepository;

use Illuminate\Http\Request;

class TaskController extends Controller
{
  
    public function __construct(TaskRepository $tasks)
    {
       // $this->middleware('auth');

        $this->tasks = $tasks;
    }
    
    public function index(Request $request)
    {
   // dd($request); 
        // return view('tasks.index', [
        //     'tasks' => $this->$tasks->forUser($request->user()),
        // ]);

        return view('tasks.index');
    }

    public function store(Request $request){
        
            $this->validate($request, [
                'name' => 'required|max:255',
            ]);
        
            $request->user()->tasks()->create([
                'name' => $request->name,
            ]);
        
            return redirect('/tasks');
    }

    public function destroy($id){
        Task::findOrFail($id)->delete();
        return redirect('/');
    }

    
}
