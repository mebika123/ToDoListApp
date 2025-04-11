<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        
        $categories = Category::where('user_id',$request->user()->id)->get();
        $tasks = Task::query();
        $tasks->where('user_id',$request->user()->id);
        if($request->input('status')){
            $tasks->where('status',$request->input('status'));
        }
        if($request->input('category_id')){
            $tasks->where('category_id',$request->input('category_id'));
        }
        if($request->input('deadline')){
            $tasks->where('due_date',$request->input('deadline'));
        }
        if($request->input('sort')=="desc"){
            $tasks->orderBy('due_date','DESC');
        }
        else{
            $tasks->orderBy('due_date','ASC');

        }
        $tasks=$tasks->get();
        return view('task.index',compact('tasks','categories'));
    }
    public function create(Request $request){
        $categories = Category::where('user_id',$request->user()->id)->get();
        return view('task.add-task', compact('categories'));

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after_or_equal:today',
            'category_id'=>'required|exists:categories,id'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->deadline;
        $task->category_id = $request->category_id;
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('task.index')->with('success','Task created successfully!');
    }
    public function edit(Request $request,$id){
        $categories = Category::where('user_id',$request->user()->id)->get();
        $task = Task::where('user_id',$request->user()->id)->findOrFail($id);
        return view('task.edit-task', compact('task','categories'));

    }
    public function update(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after_or_equal:today',
            'category_id'=>'required|exists:categories,id'
        ]);
        $task = Task::where('user_id',$request->user()->id)->findOrFail($request->id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->deadline;
        $task->category_id = $request->category_id;
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('task.index')->with('success','Task updated successfully!');
    }
    public function delete(Request $request,$id){
        $task = Task::where('user_id',$request->user()->id)->findOrFail($id);
        $task->delete();
        return redirect()->route('task.index')->with('success','Task deleted successfully!');
    }
    public function updateStatus(Request $request){
        $request->validate([
            'status'=>'required|in:pending,inProgress,completed'
        ]);
        $task = Task::where('user_id',$request->user()->id)->findOrFail($request->id);
        if($request->status == 'inProgress' && $task->status != 'pending'){
            
            return redirect()->route('task.index')->with('error','Status cannot be updated !');
        }
        if($request->status == 'completed' && $task->status != 'inProgress'){
            
            return redirect()->route('task.index')->with('error','Status cannot be updated !');
        }
        $task->status = $request->status;
        $task->save();
        return redirect()->route('task.index')->with('success','Status updated successfully!');

    }

}
