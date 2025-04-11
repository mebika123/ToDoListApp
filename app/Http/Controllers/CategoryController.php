<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::where('user_id',$request->user()->id)->get();
        return view('category.index',compact('categories'));

    }
    public function create(){
        return view('category.add-category');

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|unique:categories,title'
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->user_id = $request->user()->id;
        $category->save();
        return redirect()->route('category.index')->with('success','Category created successfully!');
    }
    public function edit(Request $request,$id){
        $category = Category::where('user_id',$request->user()->id)->findOrFail($id);
        return view('category.edit-category', compact('category'));

    }
    public function update(Request $request){
        $request->validate([
            'title'=>'required|unique:categories,title,'.$request->id
        ]);
        $category = Category::where('user_id',$request->user()->id)->findOrFail($request->id);
        $category->title = $request->title;
        $category->user_id = $request->user()->id;
        $category->save();
        return redirect()->route('category.index')->with('success','Category updated successfully!');
    }
    public function delete(Request $request,$id){
        $category = Category::where('user_id',$request->user()->id)->findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully!');
    }
}
