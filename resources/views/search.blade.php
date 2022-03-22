@extends('layout')

@section('title', 'Search')

@section('content')
    <div style="padding:2% 10%">
        <form method="get">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="title" placeholder="Search.."
                        value="{{ $request->title }}">
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="category">
                        <option value="-1">--Category--</option>
                        @foreach ($categories as $category)
                            @if ($request->category == $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input type="number" class="form-control" name="min" placeholder="Min budget.." value="{{ $request->min }}">
                </div>
                <div class="form-group col-md-2">
                    <input type="number" class="form-control" name="max" placeholder="Max budget.." value="{{ $request->max }}">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="seller" placeholder="Seller name" value="{{ $request->seller }}">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success w-100"> Search </button>
                </div>
            </div>
        </form>
        <div class="" style=" display:grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 1rem;">
            @foreach ($gigs as $gig)
                <div class="card m-2" style="width: 14rem;">
                    <a href="/gig/{{ $gig->gigId }}"><img class="card-img-top title-hover"
                            src="../storage/{{ $gig->image }}" height="200px" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="/profile/{{ $gig->userId }}" class="seller-info d-flex align-items-center mb-3">
                            <img class="rounded-circle" width="35" src="../storage/{{ $gig->profilePicture }}"
                                alt="profil">
                            <p class="my-auto ml-2">{{ $gig->userName }}</p>
                        </a>

                        <a href="/gig/{{ $gig->gigId }}" class="card-text title-hover">{{ $gig->gigName }}</a>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex" style="font-size:18px;">
                            @if($userId)
                            <button style="border:none;background-color:rgb(255, 255, 255);" class="likedGig @if(Auth::user()->favouriteGig->where('gig_id', $gig->id)->first()) liked @endif" value="{{ $gig->gigId }}">
                                <i class="fa fa-heart heart"
                                    style="text-shadow: 0 0 3px #000;)" ></i>
                            </button>
                            @endif
                            <a href="/gig/{{ $gig->id }}"> Starting at <b>${{ $gig->price1 }}</b></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="w-100 d-flex justify-content-between align-items-center">
            {{ $gigs->links() }}
        </div>
    </div>
    <script>
        const likedGig = $('.likedGig');
        likedGig.each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                if ($(this).hasClass('liked')) {
                    $.ajax({
                        url: "/love/{{ $userId }}/" + $(this).val(),
                        type: "DELETE",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $(this).removeClass('liked');
                        },
                    });
                    console.log("ini delete fav")
                } else {
                    $.ajax({
                        url: "/love/{{ $userId }}/" + $(this).val(),
                        type: "POST",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $(this).addClass('liked');
                        },
                    });
                    console.log("ini nambah ke fav")
                }
            })
        });
    </script>
@endsection
