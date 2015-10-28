<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .page {
            min-width:100vw;
            max-width:100vw;
            min-height:100vh;

            display:flex;
            flex-direction:column;
        }

        .page>nav {
            flex:0 0 auto;
        }

        .page>footer {
            flex:0 0 auto;
        }

        .page>.page-content{
            flex:1 0 auto;
        }

    </style>
</head>

<body>
    <div class="page">
        @include('nav')

        <div class="page-content">
            Content
            @yield('content')
        </div>

        @include('footer')
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</body>
</html>
