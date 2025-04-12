@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="add-task col-11 col-md-8 col-lg-6  p-4 rounded">
        <h4 class="text-center">Edit task</h4>
        <form action="{{ route('task.update') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            <div class="form-group mb-4 ">
                <label class="mb-1 fw-bold" for="title">Title</label>
                <input type="text"  value="{{ $task->title }}" name="title" placeholder="Title"
                    class="py-2 task-field px-2 w-100  @error('title')is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback text-start " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group mb-4 ">
                <label class="mb-1 fw-bold" for="description">Description</label>
                <textarea name="description" class="py-2 task-field px-2 w-100  @error('description')is-invalid @enderror" rows="3">{{ $task->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback text-start " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <div class="form-group mb-4 flex-grow-1 ">
                    <label class="mb-1 fw-bold" for="category">Category</label>
                    <select  value="{{ $task->category_id }}" name="category_id" id="" class="py-2 task-field px-2 w-100 @error('category_id')is-invalid @enderror">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback text-start " role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4 flex-grow-1 ">
                    <label class="mb-1 fw-bold" for="deadline">Deadline</label>
                    <input type="date"  value="{{ $task->due_date }}" name="deadline" placeholder="Deadline"
                        class="py-2 task-field px-2 w-100 @error('deadline')is-invalid @enderror">
                    @error('deadline')
                        <span class="invalid-feedback text-start " role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Update" class="btn btn-primary w-50">
            </div>
        </form>
    </div>
</div>
@endsection
