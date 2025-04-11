@extends('layout.log')
@section('content')
<h3 class="form-title mb-5">Log In Form</h3>
@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="form-group mb-4 ">
        <input type="email" name="email" placeholder="someone@gmail.com" class="input-field py-2 px-2 w-100 w-md-75 @error('email')is-invalid @enderror">
        @error('email')
        <span class="invalid-feedback text-start" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group mb-4">
        <input type="password" name="password" placeholder="Password" class="input-field py-2 px-2 w-100 w-md-75 @error('password')is-invalid @enderror">
        @error('email')
            <span class="invalid-feedback text-start" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="submit" value="Login" class="btn btn-primary w-50">
</form>
<p class="f-12 mt-3">Don't have account? <a href="{{ route('register') }}" class="text-primary">Register</a></p>
@endsection