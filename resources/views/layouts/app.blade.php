<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    @yield('style')

</head>

<body>
    <div id="nav">
        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="pad-none"><img src="{{ asset('logo.png') }}" width="52"
                            height="52"></img></a>
                </li>
                @guest
                <div id="login">
                    <form action="{{ route('login') }}" method="post" class="form-inline">
                        @csrf
                        <div>
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div>
                            <input type="password" name="password" id="username" autocomplete="off"
                                placeholder="Password">
                        </div>
                        <button type="submit">Login</button>
                    </form>

                </div>
                @endguest
                @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="float-r">Logout</button>
                </form>
                <li class="float-r">
                    <div class="dropdown">
                        <form action="/{{ auth()->user()->username }}" method="get">
                            <button>{{ auth()->user()->name }}</button>
                        </form>
                        <div class="dropdown-content">
                            <a href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </li>
                @endauth
            </ul>
        </nav>
    </div>
    <div id="main-field">
        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
