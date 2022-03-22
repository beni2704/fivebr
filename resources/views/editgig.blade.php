@extends('layout')

@section('title', 'Edit Gig')

@section('content')
    <div style="padding:2% 10%">
        <form method="post" @if ($gig)
            action=""
        @else
            action="/gig/create"
            @endif
            enctype="multipart/form-data">
            @csrf
            @if ($gig)
                <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control" name="name" @if ($gig) value="{{ $gig->name }}" @endif>
                @if ($errors->has('name'))
                    <p class="text-danger">The title field is required</p>
                @endif
            </div>
            <div class="form-group">
                <label for="inputCategory">Category</label>
                <select class="form-control" name="category">
                    @if ($gig)
                        <option value="{{$gig->category->id}}" selected>{{ $gig->category->name }}</option>
                    @endif
                    @foreach ($categories as $category)
                        @if ($gig)
                            @if ($category->id == $gig->category_id)
                                @continue
                            @endif
                        @endif
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" name="about" rows="6">@if ($gig){{ $gig->about }}@endif</textarea>
                @if ($errors->has('about'))
                    <p class="text-danger">The about field is required</p>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="form-grouping">
                        <label for="inputBasicPrice">Basic Price</label>
                        <input type="number" class="form-control" name="price1" @if ($gig) value="{{ $gig->price1 }}" @endif>
                        @if ($errors->has('price1'))
                            <p class="text-danger">The basic price field is required</p>
                        @endif
                    </div>
                    <div class="form-grouping">
                        <label for="inputPrice">Basic Price Description</label>
                        <textarea class="form-control" name="desc1" rows="5">@if ($gig){{ $gig->desc1 }}@endif</textarea>
                        @if ($errors->has('desc1'))
                            <p class="text-danger">The basic price description field is required</p>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-grouping">
                        <label for="inputStandartPrice">Standart Price</label>
                        <input type="number" class="form-control" name="price2" @if ($gig) value="{{ $gig->price2 }}" @endif>
                        @if ($errors->has('price2'))
                            <p class="text-danger">The standart price field is required</p>
                        @endif
                    </div>
                    <div class="form-grouping">
                        <label for="inputPrice">Standart Price Description</label>
                        <textarea class="form-control" name="desc2" rows="5">@if ($gig){{ $gig->desc2 }}@endif</textarea>
                        @if ($errors->has('desc2'))
                            <p class="text-danger">The standart price description field is required</p>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-grouping">
                        <label for="inputPremiumPrice">Premium Price</label>
                        <input type="number" class="form-control" name="price3" @if ($gig) value="{{ $gig->price3 }}" @endif>
                        @if ($errors->has('price3'))
                            <p class="text-danger">The premium price field is required</p>
                        @endif
                    </div>
                    <div class="form-grouping">
                        <label for="inputPrice">Premium Price Description</label>
                        <textarea class="form-control" name="desc3" rows="5">@if ($gig){{ $gig->desc3 }}@endif</textarea>
                        @if ($errors->has('desc3'))
                            <p class="text-danger">The premium price description field is required</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group custom-file mb-5">
                <label class="form-label" for="customFile">Images @if ($gig) (Optional) @endif</label>
                <input type="file" multiple class="form-control p-1" id="customFile" name="images[]" />
                @if ($errors->has('image'))
                    <p class="text-danger">The image field is required.</p>
                @endif
            </div>
            <button type="submit" class="btn btn-success mb-2 w-100">Submit</button>
        </form>
        <a href="/profile/{{ $userId }}"><button class="btn btn-success mb-2 w-100"
                style="opacity: 0.6;">Cancel</button></a>
        @if ($gig)
            <form method="post" action="/delete/{{$gig->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button class="btn btn-danger w-100" type="submit">Delete</button>
            </form>
        @endif
    </div>

@endsection
