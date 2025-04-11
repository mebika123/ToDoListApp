<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        $tasks = Task::where('user_id',$request->user()->id)->get();
        return view('task.index',compact('tasks'));

    }
    public function create(Request $request){
        $categories = Category::where('user_id',$request->user()->id)->get();
        return view('task.add-task', compact('categories'));

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'descrition'=>'required',
            'deadline'=>'required|date|after_or_equal:today',
            'category_id'=>'required|exists:categories,id'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->dealine;
        $task->category_id = $request->category_id;
        $task->user_id = $request->user()->id;
        $task->save();
        return redirect()->route('task.index')->with('success','Task created successfully!');
    }
    public function edit(Request $request,$id){
        $task = Task::where('user_id',$request->user()->id)->findOrFail($id);
        return view('task.edit-task', compact('task'));

    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'descrition'=>'required',
            'deadline'=>'required|date|after_or_equal:today',
            'category_id'=>'required|exists:categories,id'
        ]);
        $task = Task::where('user_id',$request->user()->id)->findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->dealine;
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
}
