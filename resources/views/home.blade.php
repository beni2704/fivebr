@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="welcome-section">
        <h1 class="welcome-title text-white">Find the perfect <i>freelance</i> services for your business</h1>
        <form class="form-inline my-2 my-lg-0" action="/search" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="title">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    <div class="p-5">
        <div class="popular-categories-section mb-5">
            <h2 class="mb-4" style="font-size:36px;">Popular Categories</h2>
            <form action="/search">
                <div class="d-flex card-group justify-content-around">
                    @foreach ($categories as $category)
                        <button type="submit" class="btn text-left border p-4" value="{{ $category->id }}"
                            name="category">{{ $category->name }}</button>
                    @endforeach
                </div>
            </form>
        </div>
        <div class="all-gigs-section">
            <h2 class="mb-4" style="font-size:36px;">All Gigs</h2>
            <div class="" style=" display:grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 1rem;"
                id="post-data">
                @include('data')
            </div>
        </div>
        <div class="ajax-load text-center" style="display:none">
            <img width="30" src="../storage/refresh.gif">
        </div>
    </div>
    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() +1 >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {
                    if (data.html == " ") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
        }
    </script>

@endsection
