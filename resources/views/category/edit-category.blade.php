@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="add-task col-11 col-md-6 p-4 rounded">
        <h4 class="text-center">Edit Category</h4>
        <form action="{{ route('category.update') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group mb-4 ">
                <label class="mb-1 fw-bold" for="title">Title</label>
                <input type="text"  value="{{ $category->title }}" name="title" placeholder="Title"
                    class="py-2 task-field px-2 w-100  @error('title')is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback text-start " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <input type="submit" value="Update" class="btn btn-primary w-50">
            </div>
        </form>
    </div>
</div>
@endsection
