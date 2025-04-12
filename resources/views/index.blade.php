@extends('layout.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="wg-chart mb-4">
                <div class="d-flex align-items-center gap-4">
                    <div class="image-icon">
                        <i class="fa-solid fa-list-ol color-purple fa-xl"></i>
                    </div>
                    <div class="body-text">
                        <div class="f-14 text-black mb-2">Total Tasks</div>
                        <h4 class="text-black">{{ $dashboardDatas['TotalTasks'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="wg-chart mb-4">
                <div class="d-flex align-items-center gap-4">
                    <div class="image-icon">
                        <i class="fa-solid fa-hourglass-start color-purple fa-xl"></i>
                    </div>
                    <div class="body-text">
                        <div class="f-14 text-black mb-2">Pending Tasks</div>
                        <h4 class="text-black">{{ $dashboardDatas['TotalPendingTasks'] }}</h4>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="wg-chart mb-4">
                <div class="d-flex align-items-center gap-4">
                    <div class="image-icon">
                        <i class="fa-solid fa-hourglass-half color-purple fa-xl"></i>
                    </div>
                    <div class="body-text">
                        <div class="f-14 text-black mb-2">In Progress Tasks</div>
                        <h4 class="text-black">{{ $dashboardDatas['TotalInProgressTasks'] }}</h4>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="wg-chart mb-4">
                <div class="d-flex align-items-center gap-4">
                    <div class="image-icon">
                        <i class="fa-solid fa-hourglass-end color-purple fa-xl"></i>
                    </div>
                    <div class="body-text">
                        <div class="f-14 text-black mb-2">Completed Tasks</div>
                        <h4 class="text-black">{{ $dashboardDatas['TotalCompletedTasks'] }}</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="add-task rounded p-3">
                <h4 class="">Today Tasks</h4>
                <div class="task-list-section mt-3">
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
                    <p class="fs-5 text-center">No Tasks For Today</p>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
