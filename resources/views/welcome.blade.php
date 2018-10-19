<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <span class="align-middle"><img src="{{ URL::to('/images/icon.svg') }}"> Skeleton</span>
                </div>

                <p>The Skeleton application already contains everything for user and session management:</p>
                <ul>
                    <li><a href="{{ route('login') }}">Login page</a>.</li>
                    <li><a href="{{ route('users') }}">List of users (you need to be logged in)</a>.</li>
                </ul>
                <p>The Skeleton application contains a lot of <a href="{{ route('examples') }}">examples for JS</a>:</p>
                <ul>
                    <li>A ton of icons</li>
                    <li>A date picker</li>
                    <li>A calendar</li>
                    <li>Some charts</li>
                    <li>A JS lib to manipulate dates</li>
                    <li>An autocomplete field</li>
                    <li>Two rich text editors</li>
                    <li>A treeview widget</li>
                </ul>
                <p>The Skeleton application contains a lot of <a href="{{ route('examples') }}">examples for PHP</a>:</p>
                <ul>
                    <li>Create an Excel file (See <a href="{{ url('/users/index') }}">list of users</a> / export)</li>
                    <li>Create a barcode</li>
                    <li>Create a PDF file</li>
                    <li>Create charts as an image</li>
                </ul>
            </div>
        </div>
    </body>
</html>
