@extends('layout.app')
@section('content')
    <div class="row">
        <div class="add-task col-11 col-md-9 p-4 rounded mx-auto">
            <h4 class="text-center">Categories</h4>
            <div class="text-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">+ New category</a>
            </div>
            <div class="task-list-section mt-4">
                @if (count($categories)>0)
                <ul class="task-list">
                    @foreach ($categories as $category)
                        <li class="task-item bg-white d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex gap-3">
                                <span>{{ $loop->iteration }}</span>
                                <p class="mb-0">{{ $category->title }}</p>
                            </div>
                            <div class="d-flex gap-2 flex-nowrap">
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                    class="btn btn-success py-1">Edit</a>
                                <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
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
