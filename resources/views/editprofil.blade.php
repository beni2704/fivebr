@extends('layout')

@section('title', 'Edit Profil')

@section('content')
<div style="padding:2% 10%">
    <div class="form-div">
        <form style="width : 50%;" method="post" action="/profile/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$user->name}}">
                @if ($errors->has('name'))
                    <p class="text-danger">The name field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{$user->email}}">
                @if ($errors->has('email'))
                    <p class="text-danger">The email field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="about">About (Optional)</label>
                <input type="text" class="form-control" placeholder="Enter about" name="about" value="{{$user->about}}">
            </div>
            <div class="form-group custom-file mb-5">
                <label class="form-label" for="customFile">Profile Picture (Optional)</label>
                <input type="file" class="form-control p-1" id="customFile" name="image" />
                @if ($errors->has('image'))
                    <p class="text-danger">The profile picture must be an image</p>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea class="form-control" placeholder="Enter description" name="description" rows="5">{{$user->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
            <a href="/profile/{{ $user->id }}" class="btn btn-success w-100 mt-3" style="opacity: 0.6">Cancel</a>


        </form>
    </div>
</div>
@endsection
