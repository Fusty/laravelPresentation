@extends('master')

@section('title')
    Home
@endsection

@section('head')
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m9 offset-m1">
            <div class="row">
                <h2 class="materialize-red-text text-lighten-2">Components</h2>
                <div class="row">
                    <div id="starthere" class="section scrollspy">
                        <h4 class="laravel-red">Start Here</h4>
                    </div>
                    <div id="applicationstructure" class="section scrollspy">
                        <h5 class="laravel-red">Application Structure</h5>
                    </div>
                    <p>content</p>
                    <div id="clistuff" class="section scrollspy">
                        <h5 class="laravel-red">CLI Stuff</h5>
                    </div>
                    <p>content</p>
                    <div id="apidocs" class="section scrollspy">
                        <h5 class="laravel-red">API Docs</h5>
                    </div>
                    <p>content</p>
                    <div id="folderpermissions" class="section scrollspy">
                        <h5 class="laravel-red">Folder Permissions</h5>
                    </div>
                    <p>content</p>
                </div>
                <div class="row">
                    <div id="routing" class="section scrollspy">
                        <h4 class="laravel-red">Routing</h4>
                    </div>
                    <div id="closureroutes" class="section scrollspy">
                        <h5 class="laravel-red">Closure Routes</h5>
                    </div>
                    <p>content</p>
                    <div id="controllerroutes" class="section scrollspy">
                        <h5 class="laravel-red">Controller Routes</h5>
                    </div>
                    <p>content</p>
                    <div id="namedroutes" class="section scrollspy">
                        <h5 class="laravel-red">Named Routes</h5>
                    </div>
                    <p>content</p>
                    <div id="routegroups" class="section scrollspy">
                        <h5 class="laravel-red">Route Groups</h5>
                    </div>
                    <p>content</p>
                    <div id="filters" class="section scrollspy">
                        <h5 class="laravel-red">Filters</h5>
                    </div>
                    <p>content</p>
                </div>
                <div class="row">
                    <div id="controllers" class="section scrollspy">
                        <h4 class="laravel-red">Controllers</h4>
                    </div>
                    <div id="simplecontroller" class="section scrollspy">
                        <h5 class="laravel-red">Simple Controller</h5>
                    </div>
                    <p>content</p>
                    <div id="restcontroller" class="section scrollspy">
                        <h5 class="laravel-red">REST Controller</h5>
                    </div>
                    <p>content</p>
                    <div id="controllerconstructors" class="section scrollspy">
                        <h5 class="laravel-red">Controller Constructors</h5>
                    </div>
                    <p>content</p>
                </div>
                <div class="row">
                    <div id="models" class="section scrollspy">
                        <h4 class="laravel-red">Models</h4>
                    </div>
                    <div id="simplestmodel" class="section scrollspy">
                        <h5 class="laravel-red">Simplest Model</h5>
                    </div>
                    <p>content</p>
                    <div id="shortcutfunctions" class="section scrollspy">
                        <h5 class="laravel-red">Shortcut Functions</h5>
                    </div>
                    <p>content</p>
                    <div id="validationrdives" class="section scrollspy">
                        <h5 class="laravel-red">Validation Rdives</h5>
                    </div>
                    <p>content</p>
                    <div id="mdivtipledatabaseaccess" class="section scrollspy">
                        <h5 class="laravel-red">Mdivtiple Database Access</h5>
                    </div>
                    <p>content</p>
                </div>
                <div class="row">
                    <div id="views" class="section scrollspy">
                        <h4 class="laravel-red">Views</h4>
                    </div>
                    <div id="whendoiview" class="section scrollspy">
                        <h5 class="laravel-red">When do I view?</h5>
                    </div>
                    <p>content</p>
                    <div id="whatgoesintheview" class="section scrollspy">
                        <h5 class="laravel-red">What goes in the view?</h5>
                    </div>
                    <p>content</p>
                    <div id="nonstandardviewstuff" class="section scrollspy">
                        <h5 class="laravel-red">Non-standard view stuff</h5>
                    </div>
                    <p>content</p>
                </div>
                <div class="row">
                    <div id="migrations" class="section scrollspy">
                        <h4 class="laravel-red">Migrations</h4>
                    </div>
                    <div id="migrationsrocktoohard" class="section scrollspy">
                        <h5 class="laravel-red">Migrations Rock Too Hard</h5>
                    </div>
                    <p>content</p>
                    <div id="basicmigration" class="section scrollspy">
                        <h5 class="laravel-red">Basic Migration</h5>
                    </div>
                    <p>content</p>
                    <div id="advancedmigration" class="section scrollspy">
                        <h5 class="laravel-red">Advanced Migration</h5>
                    </div>
                    <p>content</p>
                    <div id="seeding" class="section scrollspy">
                        <h5 class="laravel-red">Seeding</h5>
                    </div>
                    <p>content</p>
                    <div id="artisancommands" class="section scrollspy">
                        <h5 class="laravel-red">Artisan Commands</h5>
                    </div>
                    <p>content</p>
                </div>
            </div>
        </div>
        <div class="col hide-on-small-only m2">
            @include('foundation.sidenav')
        </div>
    </div>
@endsection

@section('foot')
    <script>
        $(document).ready(function(){
            $('.scrollspy').scrollSpy();
            $('.table-of-contents-wrapper').pushpin({
                top: $('.table-of-contents-wrapper').offset().top,
                bottom: "100vh"
            });
        });
    </script>
@endsection