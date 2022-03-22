@extends('layout')

@section('title', 'Login')

@section('content')
    @if (session('failed'))
    <div class="alert alert-danger">
        {{Session::get('failed')}}
    </div>
        
    @endif
    <div class="form-div">
        <h1>Login</h1>
        <form style="width : 30%;" class="bg-light p-4 rounded m-4" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email">
                @if ($errors->has('email'))
                    <p class="text-danger">The email field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <p class="text-danger">The password field is required</p>
                @endif
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label">Remember me</label>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3">Login</button>
            <a href="/register" class="btn btn-success w-100 mt-3" style="opacity: 0.7">Register</a>


        </form>
    </div>

@endsection
