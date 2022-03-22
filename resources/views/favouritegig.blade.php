@extends('layout')

@section('title', 'Search')

@section('content')
    <div style="padding:2% 10%">
        <h3>Loved Gig</h3>
        <div style=" display:grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 1rem;" id="post-data">
            @foreach ($gigs as $gig)
                <div class="card m-2">
                    <a href="/gig/{{ $gig->gig->id }}"><img class="card-img-top title-hover"
                            src="../storage/{{ $gig->gig->image }}" height="200px" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="/profile/{{ $gig->user->id }}" class="seller-info d-flex align-items-center mb-3">
                            <img class="rounded-circle" width="35" src="../storage/{{ $gig->gig->user->profile_picture }}"
                                alt="profil">
                            <p class="my-auto ml-2">{{ $gig->gig->user->name }}</p>
                        </a>

                        <a href="/gig/{{ $gig->gig->id }}" class="card-text title-hover">{{ $gig->gig->name }}</a>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex" style="font-size:18px;">
                            <button style="border:none;background-color:rgb(255, 255, 255);" class="likedGig liked"
                                value="{{ $gig->gig->id }}">
                                <i class="fa fa-heart heart" style="text-shadow: 0 0 3px #000;)"></i>
                            </button>
                            <a href="/gig/{{ $gig->id }}"> Starting at <b>${{ $gig->price1 }}</b></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        @if ($gigs->isEmpty())
            <h5 class="text-center">No Loved Gig</h5>
        @endif
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
