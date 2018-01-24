<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

            .panel-primary {
                margin-top: 70px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/js/jasny-bootstrap.min.js') }}"></script>
    </body>
</html>