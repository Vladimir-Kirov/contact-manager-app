<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Contact</title>
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
            .navbar {
                -moz-box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;
                -webkit-box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;
                box-shadow: rgba(0, 0, 0, 0.09) 0 2px 0;
            }

            .navbar .navbar-brand {
                font-weight: bold;
                letter-spacing: -1px;
                font-size: 20px;
                color: #dd5638;
            }

            .jumbotron {
                margin-top: 80px;
            }

        </style>
    </head>
    <body>
        @include('includes.admin-header')
        <div class="container">
            <div class="jumbotron text-center">
                <h1>Hello, {{ Auth::user()->name }}</h1>      
                <p>Welcome back to Contact Manager App</p>
                <div class="row">
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-lg">Manage Your contacts</a>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jasny-bootstrap.min.js') }}"></script>
</html>
