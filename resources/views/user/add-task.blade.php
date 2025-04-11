@extends('layout.app')
@section('content')
<div class="row justify-content-center">
    <div class="add-task col-11 col-md-6 p-4 rounded">
        <h4 class="text-center">Add new task</h4>
        <form action="" method="POST">
            @csrf
            <div class="form-group mb-4 ">
                <label class="mb-1 fw-bold" for="title">Title</label>
                <input type="text" name="title" placeholder="Title"
                    class="py-2 task-field px-2 w-100  @error('title')is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback text-start " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group mb-4 ">
                <label class="mb-1 fw-bold" for="description">Description</label>
                <textarea name="description" class="py-2 task-field px-2 w-100  @error('deadline')is-invalid @enderror" rows="3"></textarea>
                @error('description')
                    <span class="invalid-feedback text-start " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <div class="form-group mb-4 flex-grow-1 ">
                    <label class="mb-1 fw-bold" for="category">Category</label>
                    <select name="category" id="" class="py-2 task-field px-2 w-100 @error('deadline')is-invalid @enderror">
                        <option value="">category</option>
                        <option value="home">Home</option>
                        <option value="home">Home</option>
                    </select>
                    @error('category')
                        <span class="invalid-feedback text-start " role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4 flex-grow-1 ">
                    <label class="mb-1 fw-bold" for="deadline">Deadline</label>
                    <input type="date" name="deadline" placeholder="Deadline"
                        class="py-2 task-field px-2 w-100 @error('deadline')is-invalid @enderror">
                    @error('deadline')
                        <span class="invalid-feedback text-start " role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Add" class="btn btn-primary w-50">
            </div>
        </form>
    </div>
</div>
@endsection
