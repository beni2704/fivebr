<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="../../../css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b1a699c7f3.js" crossorigin="anonymous"></script>
    <title>FiveBR - @yield('title')</title>
</head>

<body>
    <nav class="d-flex justify-content-between border-bottom" style="padding:0 10%">
        <div class="left-nav d-flex ">
            <a href="/">
                <h1>FiveBR</h1>
            </a>
            <form class="form-inline" action="/search">
                <input class="form-control mr-sm-2 mx-4" type="search" placeholder="Search" aria-label="Search"
                    name="title">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="right-nav d-flex justify-content-around align-items-center">
            <form action="/search">
                <div class="dropdown-category">
                    <p class="dropbtn my-auto" style="font-size:20px">Category</p>
                    <div class="dropdown-content">
                        @foreach ($categoriesList as $categoryList)
                            <button type="submit" class="btn text-left w-100" value="{{ $categoryList->id }}" name="category">{{ $categoryList->name }}</button>
                        @endforeach
                    </div>
                </div>
            </form>

            @if (Auth::check())
                <div class="nav-item dropdown">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" width="40" height="40"
                            src="../../../storage/{{ $pp->profile_picture }}" alt="{{ $pp->profile_picture }}"
                            class="">
                </a>
                <div class=" dropdown-menu"
                            aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile/{{ $userId }}">Profile</a>
                        <a class="dropdown-item" href="/transactions">Transactions</a>
                        <a class="dropdown-item" href="/loved">Loved Gigs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                </div>
        </div>
    @else
        <a href="/register" class="mx-2"><button type="button" class="btn btn-success">Register</button></a>
        <a href="/login" class="mx-2"><button type="button" class="btn btn-success"
                style="opacity: 0.7">Login</button></a>
        @endif
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <footer class="d-flex align-items-center border-top" style="margin: 0 5%">
        <h1>fiveBR</h1>
        <p>&copy; Fiverr International Ltd. 2021</p>
    </footer>
</body>
</html>
