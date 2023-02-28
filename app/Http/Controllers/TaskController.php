<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\task;

class TaskController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function createTask(Request $request){
        return view('admin.task.add-task');
    }
    public function saveTask(Request $request){
        $tasks = new Task();
        $tasks->name = $request->name;
        $tasks->description = $request->description;
        $tasks->save();
        return redirect('add-task');

    }
    public function showTask(){
        return view('admin.task.show-task',[
            'tasks'=> Task::all()
        ]);
    }
    public function editTask($id){
        return view('admin.task.edit-task',[
            'task'=>Task::find($id)
        ]);
    }
    public function updateTask(Request $request){
        $this->tasks = Task::find($request->task_id);

        $this->tasks->name = $request->name;
        $this->tasks->description = $request->description;
        $this->tasks->save();
        return redirect('show-task');
    }
    public function status($id){
        $task = Task::find($id);
        if($task->status ==1){
            $task->status = 0;
            $task->save();
            return back();
        }else{
            $task->status=1;
            $task->save();
            return back();
        }
    }
    public function delete(Request $request){
        $this->task = Task::find($request->task_id);

        $this->task->delete();
        return redirect('show-task');

    }

}
