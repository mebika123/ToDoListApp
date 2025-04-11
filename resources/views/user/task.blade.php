@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
            <a href="" class="btn btn-primary">New task</a>
            <i class="fa-solid fa-bars text-light fa-lg"></i>
    </div>
    <div class="task-list-section mt-4">
        <div class="row ">
            <div class="col-3">
                <div class="task-date">3 April, 2025</div>
            </div>
            <div class="col-9">
                <ul class="task-list">
                    <li class="task-item">Do work 
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-primary">Delete</a>

                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection