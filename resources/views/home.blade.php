@extends('master')

@section('title')
Home
@endsection

@section('content')
    <div class="row">
        <div class="col s2 offset-s1 m3 offset-m1">
            <div class="slider">
                <ul class="slides border-radius">
                    <li class="border-radius">
                        <img class="img-responsive img-left" src="{{ URL::to('img/routes.png') }}">
                        <div class="caption caption-shadow border-radius center-align materialize-red-text text-lighten-2"><h4 class="z-depth-1">420 Route It</h4></div>
                    </li>
                    <li class="border-radius">
                        <img class="img-responsive img-left" src="{{ URL::to('img/model.png') }}">
                        <div class="caption caption-shadow border-radius center-align materialize-red-text text-lighten-2"><h4 class="z-depth-1">360 Noscoped User Model</h4></div>
                    </li>
                    <li class="border-radius">
                        <img class="img-responsive img-left" src="{{ URL::to('img/migration.png') }}">
                        <div class="caption caption-shadow border-radius center-align materialize-red-text text-lighten-2"><h4 class="z-depth-1">Major League Migrations</h4></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col s8 m7">
            <h1 class="materialize-red-text text-lighten-2">Ready to learn Laravel?</h1>
            <p class="flow-text">
                Well buckle up.  We're going to dive right down Laravel's throat and dismember it bit by . . .
                ok this is getting weird.  We're just going to learn Laravel 5.  It's cool.  It's fun to use.  It's got
                everything you need to build the web today (except maybe scaling super big).
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col m4 offset-m4 s8 offset-s2 center-align">
            <a href="{{ URL::to('foundation#start-here') }}" class="waves-effect waves-light btn-large">LEARN</a>
        </div>
    </div>
@endsection

@section('foot')
    <script>
        $(".slider").slider();
    </script>
@endsection