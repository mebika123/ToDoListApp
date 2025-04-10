@extends('layout.app')
@section('content')
    <div class="row justify-content-center">
        <div class="add-task col-11 col-md-9 p-4 rounded ">
            <h4 class="text-center">Tasks</h4>
            <div class="text-end">
                <a href="{{ route('task.create') }}" class="btn btn-primary">+ New task</a>
            </div>
            <div class="task-list-section mt-4">
                @if (count($tasks)>0)
                    <ul class="task-list">
                        @foreach ($tasks as $task)
                            <li class="task-item bg-white d-flex justify-content-between align-items-center p-2">
                                <div>
                                    <p class="mb-0">{{ $task->title }}<span
                                            class="badge text-bg-secondary ms-2">{{ $task->status }}</span></p>
                                    <p class="mb-0">{{ substr($task->description, 0, 20) }}</p>
                                    <p class="mb-0">{{ $task->due_date }}</p>
                                </div>
                                <div class="d-flex gap-2 flex-nowrap">
                                    <a href="{{ route('task.edit', ['id' => $task->id]) }}"
                                        class="btn btn-success py-1">Edit</a>
                                    <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="fs-4 text-center">No Tasks Found</p>
                @endif
            </div>
        </div>
    </div>
@endsection
