@extends('layout')

@section('title', 'Register')

@section('content')
    
    <div class="form-div">
        <h1>Register</h1>
        <form style="width : 30%;" class="bg-light p-4 rounded m-4" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name">
                @if($errors->has('name'))
                    <p class="text-danger">The name field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email">
                @if($errors->has('email'))
                    <p class="text-danger">The email field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                @if($errors->has('password'))
                    <p class="text-danger">The password field is required</p>
                @endif
            </div>
            
            <button type="submit" class="btn btn-success w-100">Register</button>
            <a href="/login"class="btn btn-success w-100 mt-3" style="opacity: 0.7">Login</a>
            
        </form>
    </div>

@endsection
