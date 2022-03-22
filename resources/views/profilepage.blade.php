@extends('layout')

@section('title', 'Profile')

@section('content')

@foreach ($users as $user)
<div class="d-flex" style="padding: 2% 10%">
    <div class="card" style="width: 25rem;">
        <img class="card-img-top" width="200px" height="200px" src="../storage/{{ $user->profile_picture }}" alt="Card image cap" style="object-fit:cover;">
        <div class="card-body text-center">
            <p style="font-size:20px"><b>{{$user->name}}</b></p>
            <p>{{$user->about}}</p>
            @if($user->id == $userId)
            <a href="/profile/edit/{{ $userId }}"><button class="btn btn-success mb-3 w-100">Edit Profile</button></a>
            @endif
            <p style="font-size:20px">Description</p>
            <p class="border-bottom pb-3">{{$user->description}}</p>
            <div class="member-info d-flex justify-content-between">
                <p>&reg; Member since</p>
                <p><b>{{ $user->created_at->format('M d, Y') }}</b></p>
            </div>
        </div>
    </div>
    <div class="gig-profil ml-5">
        <div class="gig-create d-flex justify-content-between">
            <p class="my-auto mr-5"><b>{{$user->name}}'s Gigs</b></p>
            @if($user->id == $userId)
            <a href="/gig/create"><button class="btn btn-success">+ Create a new Gig</button></a>
            
            @endif
        </div>
        <div class="d-flex flex-wrap">
            @include('data')
        </div>
    </div>
</div>
@endforeach

@endsection