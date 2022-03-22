@foreach ($gigs as $gig)
    <div class="card m-2" >
        <a href="/gig/{{ $gig->id }}"><img class="card-img-top title-hover" src="../storage/{{ $gig->image }}" height="200px"
                alt="Card image cap"></a>
        <div class="card-body">
            <a href="/profile/{{ $gig->user->id }}" class="seller-info d-flex align-items-center mb-3">
                <img class="rounded-circle" width="35" src="../storage/{{ $gig->user->profile_picture }}" alt="profil">
                <p class="my-auto ml-2">{{ $gig->user->name }}</p>
            </a>

            <a href="/gig/{{ $gig->id }}" class="card-text title-hover">{{ $gig->name }}</a>
        </div>
        <div class="list-group list-group-flush">
            <a href="/gig/{{ $gig->id }}" class="list-group-item text-right" style="font-size:18px;">Starting at
                <b>${{ $gig->price1 }}</b></a>
        </div>
    </div>
@endforeach
