@extends('master')

@section('title')
    Home
@endsection

@section('head')
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m9 offset-m1">
            <h2 class="materialize-red-text text-lighten-2">Foundation</h2>

            <div id="starthere" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Start Here</h4>

                    <p>So you've decided to learn about Laravel. That's excellent. Laravel is a wonderful framework that
                        has been built very carefully. It is an MVC framework that helps beginner PHP developers and
                        more advanced developers develop sustainable applications. It's little brother Lumen is great
                        for smaller projects and utilites. </p>
                </div>
            </div>

            <div id="applicationstructure" class="section scrollspy row">
                <div class="col s12 m6">
                    <h5 class="laravel-red">Application Structure</h5>

                    <p>Here's the basic structure. I have a couple of things in here that I ALWAYS add and I'll go over
                        those.  </p>
                    <p>Firstly</p>
                </div>
                <div class="col s12 m6">
                    <pre class="prettyprint">
├── app
│   ├── Console
│   │   ├── Commands
│   │   │   └── Inspire.php
│   │   └── Kernel.php
│   ├── Events
│   │   └── Event.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Auth
│   │   │   │   ├── AuthController.php
│   │   │   │   └── PasswordController.php
│   │   │   └── Controller.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   └── VerifyCsrfToken.php
│   │   ├── Requests
│   │   │   └── Request.php
│   │   └── routes.php
│   ├── Jobs
│   │   └── Job.php
│   ├── Listeners
│   ├── Policies
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── User.php
├── artisan
├── bootstrap
│   ├── app.php
│   ├── autoload.php
│   └── cache
│       └── services.json
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── compile.php
│   ├── database.php
│   ├── filesystems.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── factories
│   │   └── ModelFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   └── 2014_10_12_100000_create_password_resets_table.php
│   └── seeds
│       └── DatabaseSeeder.php
├── gulpfile.js
├── package.json
├── phpspec.yml
├── phpunit.xml
├── public
│   ├── css -> ../resources/assets/css
│   ├── favicon.ico
│   ├── font -> ../resources/assets/font
│   ├── img -> ../resources/assets/img
│   ├── index.php
│   ├── js -> ../resources/assets/js/bin
│   └── robots.txt
├── readme.md
├── resources
│   ├── assets
│   │   ├── css
│   │   ├── font
│   │   ├── img
│   │   ├── js
│   │   └── sass
│   │       ├── app.scss
│   ├── lang
│   │   └── en
│   │       ├── auth.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       └── validation.php
│   └── views
│       ├── errors
│       │   └── 503.blade.php
│       ├── vendor
│       └── welcome.blade.php
├── server.php
├── storage
│   ├── app
│   ├── framework
│   │   ├── cache
│   │   ├── sessions
│   │   └── views
│   └── logs
│       └── laravel.log
├── tests
│   ├── ExampleTest.php
│   └── TestCase.php

                    </pre>
                </div>
            </div>

            <div id="clistuff" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">CLI Stuff</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="apidocs" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">API Docs</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="folderpermissions" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Folder Permissions</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="routing" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Routing</h4>
                </div>
            </div>

            <div id="closureroutes" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Closure Routes</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="controllerroutes" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Controller Routes</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="namedroutes" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Named Routes</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="routegroups" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Route Groups</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="filters" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Filters</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="controllers" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Controllers</h4>
                </div>
            </div>

            <div id="simplecontroller" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Simple Controller</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="restcontroller" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">REST Controller</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="controllerconstructors" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Controller Constructors</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="models" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Models</h4>
                </div>
            </div>

            <div id="simplestmodel" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Simplest Model</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="shortcutfunctions" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Shortcut Functions</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="validationrules" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Validation Rules</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="multipledatabaseaccess" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Multiple Database Access</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="views" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Views</h4>
                </div>
            </div>

            <div id="whendoiview" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">When do I view?</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="whatgoesintheview" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">What goes in the view?</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="nonstandardviewstuff" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Non-standard view stuff</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="migrations" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Migrations</h4>
                </div>
            </div>

            <div id="migrationsrocktoohard" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Migrations Rock Too Hard</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="basicmigration" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Basic Migration</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="advancedmigration" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Advanced Migration</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="seeding" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Seeding</h5>

                    <p>content</p>
                </div>
            </div>

            <div id="artisancommands" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Artisan Commands</h5>

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
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=&skin=desert"></script>
    <script>
        $(document).ready(function () {
            $('.scrollspy').scrollSpy();
            $('.table-of-contents-wrapper').pushpin({
                top: $('.table-of-contents-wrapper').offset().top,
                bottom: $('.page-footer').offset().top - $('.table-of-contents-wrapper').height()
            });
        });
    </script>
@endsection