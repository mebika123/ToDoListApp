<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('user.task');
    }
    public function create(){
        return view('user.add-task');
    }
}
