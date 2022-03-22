@extends('layout')

@section('title', 'Checkout')

@section('content')
    <div style="padding: 2% 10%">
        <h1>Gig Checkout</h1>
        <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <p>{{ $gig->category->name }}</p>
                            <h5 style="margin-top:-12px">{{ $gig->name }}</h5>
                            <div class="d-flex align-items-center mb-2">
                                <a href="/profile/{{ $gig->user->id }}"
                                    class="seller-info d-flex align-items-center border-right pr-2 mr-2">
                                    <img class="rounded-circle" width="35"
                                        src="../../../storage/{{ $gig->user->profile_picture }}" alt="profil">
                                    <p class="my-auto ml-2">{{ $gig->user->name }}</p>
                                </a>
                                <p class="border-right my-auto pr-2 mr-2">&star; {{ $ratingAverage }}
                                    ({{ $ratingCount }})</p>
                            </div>
                            <p>{{ $gig->about }}</p>
                        </div>
                        <div>
                            <img src="../../../storage/{{ $gig->image }}" alt="image" class="w-50">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="/gig/checkout/{{ $gig->id }}" method="post">
                            @csrf
                            @if ($type == 'basic')
                                <input type="hidden" name="type" value="Basic" />
                                <input type="hidden" name="price" value="{{ $gig->price1 }}" />
                                <h5>Basic</h5>
                                <h6>${{ $gig->price1 }}</h6>
                            @elseif ($type == 'standart')
                                <input type="hidden" name="type" value="Standart" />
                                <input type="hidden" name="price" value="{{ $gig->price2 }}" />
                                <h5>Standart</h5>
                                <h6>${{ $gig->price2 }}</h6>
                            @elseif ($type == 'premium')
                                <input type="hidden" name="type" value="Premium" />
                                <input type="hidden" name="price" value="{{ $gig->price3 }}" />
                                <h5>Premium</h5>
                                <h6>${{ $gig->price3 }}</h6>
                            @endif
                            <button type="submit" class="btn btn-success w-100 mt-2">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
