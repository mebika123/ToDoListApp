@extends('layout.app')
@section('content')
    <div class="row justify-content-center">
        <div class="add-task col-11 col-md-9 p-4 rounded ">
            <h4 class="text-center">Tasks</h4>
            <div class="text-end">
                <a href="{{ route('task.create') }}" class="btn btn-primary">+ New task</a>
            </div>
            @if (Session::has('success'))
                <p class="alert alert-success mt-2">{{ Session::get('success') }}</p>
            @endif
            @if (Session::has('error'))
                <p class="alert alert-danger mt-2">{{ Session::get('error') }}</p>
            @endif
            <h5 class="fw-bold">Filters</h5>
            <form action="{{ route('task.index') }}">
                <div class="row">
                    <div class="form-group mb-4 col-sm-6 col-md-4 ">
                        <label class="mb-1" for="category">Category</label>
                        <select name="category_id" class="py-2 task-field px-2 w-100">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mb-4 col-sm-6 col-md-4 ">
                        <label class="mb-1" for="">Status</label>
                        <select name="status" id="" class="py-2 task-field px-2 w-100">
                            <option value="">Select Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="inProgress" {{ request('status') == 'inProgress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>

                    </div>
                    <div class="form-group mb-4 col-sm-6 col-md-4 ">
                        <label class="mb-1" for="category">Deadline</label>
                        <input type="date" name="deadline" id="" value="{{ request('deadline') }}"
                            class="w-100 p-2 task-field">
                    </div>
                </div>
                <div class="form-group mb-4 col-sm-6 col-md-4 ">
                    <label class="mb-1" for="">Sort By Deadline</label>
                    <select name="sort" id="" class="py-2 task-field px-2 w-100">
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>

                <input type="submit" value="Apply" class="btn btn-primary py-1">
            </form>
            <div class="task-list-section mt-4">
                @if (count($tasks) > 0)
                    <ul class="task-list ps-0">
                        @foreach ($tasks as $task)
                            <li class="task-item flex-column gap-2 bg-white d-flex flex-sm-row justify-content-between align-items-sm-center p-2 mb-2">
                                <div>
                                    <p class="mb-1
                                @if ($task->status == 'completed') text-decoration-line-through @endif">
                                        {{ $task->title }}
                                        <span
                                            class="badge 
                                        @if ($task->status == 'pending')
                                        bg-red 
                                        @elseif ($task->status == 'inProgress')
                                        bg-purple
                                        @else
                                        bg-green 
                                        @endif
                                         ms-2">{{ $task->status }}</span>
                                    </p>
                                    <p class="mb-0 f-12">{{ substr($task->description, 0, 20) }}</p>
                                    <p class="mb-0">{{ $task->due_date }}</p>
                                </div>
                                <div class="d-flex gap-2 flex-nowrap action-btn align-self-sm-center align-self-end">
                                    <form action="{{ route('task.update_status') }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $task->id }}" name="id">
                                        @if ($task->status == 'pending')
                                            <input type="hidden" name="status" value="inProgress">
                                            <button class="btn bg-purple text-white py-1">Start</button>
                                        @elseif ($task->status == 'inProgress')
                                            <input type="hidden" name="status" value="completed">
                                            <button class="btn bg-green text-white py-1">Complete</button>
                                        @endif
                                    </form>
                                    <a href="{{ route('task.edit', ['id' => $task->id]) }}"
                                        class="btn bg-yellow py-1">Edit</a>
                                    <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn bg-red  py-1">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="fs-5 text-center">No Tasks Found</p>
                @endif
            </div>
        </div>
    </div>
@endsection
