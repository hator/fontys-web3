<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') -- Awesome CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                @if (Auth::check())
                    <a class="btn btn-primary" href="{{ action('ArticlesController@index') }}">List articles</a>

                    @can('create', App\Article::class)
                        <a class="btn btn-success" href="{{ action('ArticlesController@create') }}">Create new article</a>
                    @endcan

                    <a href="{{ url('/logout') }}"
                        class="btn btn-danger"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
                    <a class="btn btn-primary" href="{{ url('/register') }}">Register</a>
                @endif
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
