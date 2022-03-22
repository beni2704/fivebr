@extends('layout')

@section('title', 'Gig Detail')

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ Session::get('success') }}
        </div>
    @endif
    <div style="padding: 2% 10% ">
        <div class="d-flex justify-content-around ">
            <div class="flex-left-gig">
                <p>{{ $gig->category->name }}</p>
                <h4>{{ $gig->name }}</h4>
                <div class="d-flex align-items-center mb-2">
                    <a href="/profile/{{ $gig->user->id }}"
                        class="seller-info d-flex align-items-center border-right pr-2 mr-2">
                        <img class="rounded-circle" width="35" src="../storage/{{ $gig->user->profile_picture }}"
                            alt="profil">
                        <p class="my-auto ml-2">{{ $gig->user->name }}</p>
                    </a>
                    <p class="border-right my-auto pr-2 mr-2">&star; {{ $ratingAverage }} ({{ $ratingCount }})</p>
                    <button style="border:none;background-color:rgb(255, 255, 255)"
                        id="likedGig" value="{{ $gig->id }}" @if (!$isFavourite->isEmpty()) class="liked" @endif>
                        <i class="fa fa-heart" id="heartIcon" style="text-shadow: 0 0 3px #000; @if(!$isFavourite->isEmpty()) color:red; @else color:white;  @endif)"></i>
                    </button>
                </div>
                <img class="w-75" src="../storage/{{ $gig->image }}" alt="">
                <div class="d-flex flex-row mb-5 mt-2">
                    <img height="60px" width="100px" src="../storage/{{ $gig->image }}" class="mr-2">
                    @foreach ($images as $image)
                        <img height="60px" width="100px" src="../storage/{{ $image->image_detail }}"
                            class="mr-2">
                    @endforeach
                </div>
            </div>
            <div class="flex-right-gig">
                @if ($gig->user_id == $userId)
                    <a href="/gig/edit/{{ $gig->id }}"> <button class="btn btn-success mb-2" style="width:100%;">Edit
                            gig</button></a>
                @endif
                <div class="card mb-3" style="width:24rem">
                    <div class="card-body">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <p>Starter Package</p>
                            <p>${{ $gig->price1 }}</p>
                        </div>
                        <p>{{ $gig->desc1 }}</p>
                        @if ($userId)
                            @if ($userId != $gig->user_id)
                                <a href="/gig/checkout/{{ $gig->id }}/basic"><button
                                        class="btn btn-success w-100">Continue (${{ $gig->price1 }})</button></a>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card mb-3" style="width:24rem">
                    <div class="card-body">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <p>Best Package</p>
                            <p>${{ $gig->price2 }}</p>
                        </div>
                        <p>{{ $gig->desc2 }}</p>
                        @if ($userId)
                            @if ($userId != $gig->user_id)
                                <a href="/gig/checkout/{{ $gig->id }}/standart"><button
                                        class="btn btn-success w-100">Continue (${{ $gig->price2 }})</button></a>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card" style="width:24rem">
                    <div class="card-body">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <p>Premium Package</p>
                            <p>${{ $gig->price3 }}</p>
                        </div>
                        <p>{{ $gig->desc3 }}</p>
                        @if ($userId)
                            @if ($userId != $gig->user_id)
                                <a href="/gig/checkout/{{ $gig->id }}/premium"><button
                                        class="btn btn-success w-100">Continue (${{ $gig->price3 }})</button></a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="about-gig">
            <h5>About This Gig</h5>
            <p>{{ $gig->about }}</p>
        </div>
        <div class="about-seller">
            <h5>About The Seller</h5>
            <div class="seller-info-gig d-flex">
                <img class="rounded-circle" height="100px" width="100px"
                    src="../storage/{{ $gig->user->profile_picture }}" alt="">
                <div class="ml-3 my-auto">
                    <b>{{ $gig->user->name }}</b>
                    <p>{{ $gig->user->about }}</p>
                </div>
            </div>
        </div>
        <div class="card-seller pb-4 border-bottom">
            <div class="card mt-4" style="width: 30rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Member Since <br>
                        <b>{{ $gig->user->created_at->format('M d, Y') }}</b>
                    </li>
                    <li class="list-group-item">
                        {{ $gig->user->description }}
                    </li>
                </ul>
            </div>
        </div>

        @if ($userId)
            @if (!$transactionValid->isEmpty())
                <form action="/gig/review/{{ $gig->id }}" method="post">
                    @csrf
                    <div class="form-grouping">
                        <label for="inputRating">Rating (1 to 5)</label>
                        <input type="number" class="form-control" name="rating">
                        @if ($errors->has('rating'))
                            <p class="text-danger">Rating must between 1 and 5</p>
                        @endif
                    </div>
                    <div class="form-grouping">
                        <label for="inputBody">Body</label>
                        <textarea class="form-control" name="review" rows="5"></textarea>
                        @if ($errors->has('review'))
                            <p class="text-danger">Review field is required</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
                </form>
            @endif
        @endif

        @foreach ($reviews as $review)
            <div class="review-group my-4 border-bottom">
                <div class="reviewer-group d-flex mb-2">
                    <img class="rounded-circle" height="40px" width="40px"
                        src="../storage/{{ $gig->user->profile_picture }}" alt="">
                    <div class="ml-3 my-auto d-flex ">
                        <b>{{ $review->user->name }} </b>
                        <p class="ml-3 text-warning">&star;{{ $review->rating }}</p>
                    </div>
                </div>
                <p>{{ $review->review }}</p>
                <p>{{ $review->review_date }}</p>
            </div>
        @endforeach
        <div class="">
            {{ $reviews->links() }}
        </div>
    </div>

    <script>
        const likedGig = $('#likedGig');
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
                        url: "/love/{{ $userId }}/{{ $gig->id }}",
                        type: "DELETE",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $('#heartIcon').css('color', 'white')
                            $(this).removeClass('liked');
                        },
                    });
                    console.log("ini delete fav")
                } else {
                    $.ajax({
                        url: "/love/{{ $userId }}/{{ $gig->id }}",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $('#heartIcon').css('color', 'red');
                            $(this).addClass('liked');
                        },
                    });
                    console.log("ini nambah ke fav")
                }
            })
        });
    </script>
@endsection
