@extends('layout.log')
@section('content')
<h3 class="form-title mb-5">Registration Form</h3>
<form action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="form-group mb-4 ">
        <input type="text" name="name" placeholder="UserName" class="input-field py-2 px-2 w-100 w-md-75 @error('name')is-invalid @enderror">
        @error('name')
            <span class="invalid-feedback text-start " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror     
            
    </div>
    <div class="form-group mb-4">
        <input type="email" name="email" placeholder="someone@gmail.com" class="input-field py-2 px-2 w-100 w-md-75 @error('email')is-invalid @enderror">
        @error('email')
        <span class="invalid-feedback text-start" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
    </div>  
    <div class="form-group mb-4">
        <input type="password" name="password" placeholder="Password" class="input-field py-2 px-2 w-100 w-md-75 @error('password')is-invalid @enderror">
    @error('password')
    <span class="invalid-feedback text-start" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror 
    </div>
    <div class="form-group mb-4">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input-field py-2 px-2 w-100 w-md-75">
    </div>
    <input type="submit" value="Register" class="btn btn-primary w-50">
</form>
<p class="f-12 mt-3">Already have account? <a href="{{ route('login') }}" class="text-primary">Log In</a></p>
@endsection