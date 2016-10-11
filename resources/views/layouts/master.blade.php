<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>@yield('title') -- Awesome CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
        body {
            background-color: powderblue;
        }
        .top-right {
            border-bottom: 2px solid darkblue;
            margin-bottom: 30px;
        }
        .top-right .btn {
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .panel {
            padding: 10px;
        }
        .article-content {
            margin: 10px;
            word-wrap: break-word;
            text-align: justify;
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a class="btn btn-primary" href="{{ action('ArticlesController@index') }}">List articles</a>
                @if (Auth::check())
                    <a class="btn btn-warning" href="{{ action('HomeController@index') }}">Your profile</a>

                    @can('create', App\Article::class)
                        <a class="btn btn-success" href="{{ action('ArticlesController@create') }}">Create new article</a>
                    @endcan
                    @if(Auth::user()->isAdmin())
                        <a class="btn btn-info" href="{{ action('ProfileController@showAdminPanel') }}">Admin panel</a>
                    @endif
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
