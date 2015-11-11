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
                        those. </p>

                    <p>Firstly we have the <b>/app/</b> directory. This holds the controllers, models, routes and some
                        other fun stuff. The only thing you'll put directly in this directory are models. There is
                        already a default User model in here (User.php)<br/><br/>

                        <b>/Console/</b> is where all of the artisan CLI commands live. Things like running migrations,
                        seeding the database, or creating new controllers/models/etc. from the command line.<br/><br/>

                        <b>/Events/</b> is where event classes will live. Events are a way of triggering behavior from
                        inside the application. It could be something as simple as "the user has confirmed their email
                        address" or as complex as "batch processing finished successfully, push that data off the
                        cliff".<br/><br/>

                        <b>/Exceptions/</b> is where all your exception handles should go. At least the general ones.
                        Laravel doesn't really care where you put things.<br/><br/>

                        <b>/Http/</b> is where all your controllers, routes and filters will live. Controllers marshall
                        the bulk of the application. Routes connect incoming requests with the appropriate controller
                        (or anonymous function as we'll see later), and Filters are powerful ways to impose shared
                        behavior on routes or groups of routes (think authentication, or HTTPS only).<br/><br/>

                        <b>/Jobs/</b> is a directory for queuable jobs. You'll need a driver like Beanstalkd, IronMQ,
                        AmazonSQS or Redis to use these. This is stuff like sending a user an email reminder 5 hours
                        from now, or batch processing at certain times or offsets.<br/><br/>

                        <b>/Listeners/</b> will work the the exceptions described above. These actually execute some
                        logic based on the above events firing.<br/><br/>

                        <b>/Policies/</b> is an interesting section I have not used yet. You can write policies for
                        resources users can control. Here you could define a policy that says normal users can view a
                        given resource, but not update it.<br/><br/>

                        <b>/Providers/</b> this directory contains classes that map parts of your application for easy
                        use. For instance if you created the Policy described in the section above you would need to
                        register it in the AuthServiceProvider. The AuthServiceProvider has a $policies property which
                        is an array which maps certain resources to their policy classes.<br/><br/>

                    </p>

                    <p>Alongside <b>/app/</b> we have some other important chunks of the framework.
                    </p>

                    <p>
                        <b>/bootstrap/</b> is what kickstarts the framework. It gets autoloading humming and generally
                        should be left alone. Occasionally you'll need to regenerate the cache directory, but this is
                        done through artisan CLI commands.<br/><br/>
                    </p>

                    <p>
                        <b>/config/</b> holds all the configuration files for Laravel. It "should" also hold any
                        configuration files for the packages you install via composer.</p>

                    <p>Inside <b>/database/</b> lives our migrations, database seeds and any fake data factories you'll
                        need for testing.</p>

                    <p>
                        <b>/public/</b> is what you'll actually serve to people. I often name the entire Laravel project
                        directory something like <b>/projectNameSource/</b> and symlink a directory named <b>/projectName/</b>
                        to <b>/projectNameSource/public/</b>. On apache or nginx servers running multiple Laravel
                        projects this works very well.
                    </p>

                    <p>
                        Inside <b>/resources/</b> lives our views and other static assets. I'd put compilable assets
                        here as well as things like css, images, fonts etc. I usually symlink the servable directories
                        (excludes scss/less/es6) into the <b>/public/</b> directory.
                    </p>

                    <p>
                        <b>/storage/</b> is a directory you can almost totally ignore. It caches views and stuff to
                        optimize the application a bit. It also stores other temporary things here. You'll need to open
                        this directory to writing by your server user (apache, www-data etc.).
                    </p>

                    <p>
                        <b>/tests/</b> who knows what goes here? Nobody tests applications. Just kidding!<br>
                        PHPUnit is packaged with Laravel 5 by default. It has a little demo test in here to get you
                        started.
                    </p>

                    <p>
                        <b>/vendor/</b> this is where the framework guts and any other composer packages go. This is how
                        composer and psr-0 and psr-4 autoloading works.
                    </p>

                    <p>
                        <b>NOTE: </b> This is all very different from Laravel 4. It takes some getting used to, and the
                        community remains a bit split on some of these changes. Just remember, where things go doesn't
                        really matter. It's not like it's any crazier than SpringMVC!
                    </p>

                </div>
                <div class="col s12 m6">
                    <pre class="">
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
└── tests
    ├── ExampleTest.php
    └── TestCase.php

                    </pre>
                </div>
            </div>

            <div id="clistuff" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">CLI Stuff</h5>

                    <p>The CLI commands rock. They are generally referred to as artisan commands. They'll take the form
                        of <b>"php artisan command arguments"</b><br/><br/>

                        To list all the commands just run <b>"php artisan"</b>.<br/><br/>

                        You can generate almost all classes in the <b>/app/Http/</b> directory with artisan commands.
                        Just check out <b>"php artisan list make"</b><br/><br/>

                        Another handy thing is putting the app in maintenance mode (displays a canned message to the
                        user that the site is down). This is toggleable with <b>"php artisan down"</b> and <b>"php
                            artisan up"</b><br/><br/>

                        You'll also run your migrations from here. <b>"php artisan migrate"</b> will run all pending
                        migrations. <b>"php artisan migrate:refresh"</b> will rollback all migrations and rerun them.
                        Furthermore <b>"php artisan migrate:refresh --seed"</b> will rollback all migrations, rerun them
                        and then seed the tables based on the content of <b>/app/database/seeds/DatabaseSeeder.php</b>.
                        If you've got multiple seeders and wish to target a specific seeder class just issue the
                        following <b>"php artisan migrate:refresh --seed --class=SomeSeederClassFileName"</b>
                    </p>
                </div>
            </div>

            <div id="apidocs" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">API Docs</h5>

                    <p>The api documentation for Laravel is great. It's all autogenerated but you'll often find the
                        normal documentation lacking in depth. I've found lots of goodies by poking around the api docs.
                        <a href="http://laravel.com/api/5.1/">You can find them here.</a></p>
                </div>
            </div>

            <div id="folderpermissions" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Folder Permissions</h5>

                    <p>This is something that often trips folks up when starting a Laravel project. The most important
                        thing is to make sure /app/storage/ and /app/bootstrap/cache is writable by your webserver
                        user.</p>
                </div>
            </div>

            <div id="routing" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Routing</h4>

                    <p>
                        Routing in Laravel is freaking sweet and dirt simple. It's the first thing that wowed me and
                        made me wonder why
                        so many other frameworks made this difficult.
                    </p>

                    <p>
                        All your routing can live within <b>/app/Http/routes.php</b>. Let's go over some routing
                        examples.
                    </p>
                    <pre class="prettyprint">
Route::get('/', function () {
    return view('home');
});
                    </pre>
                    <p>
                        This is the barebones root route. Let's dissect it piece by piece.<br/><br/>

                        First we call get() function on the Route facade. This means we're only going to be handling get
                        requests with this specific route. Other options include post(), put(), patch(), delete(),
                        resource() and any(). The http verbs do what you think, only route requests using that verb. The
                        resource() method is special and will map all http verbs to a RESTful controller with method
                        names corresponding to the verbs. I'll go over that example a bit later.<br/><br/>

                        Next we have the arguments for get(). The first argument is the url structure we want to
                        capture. In this case it's the root for this project. This argument takes strings like
                        "/home/user/userProfile".<br/><br/>

                        The second argument in this case is an anonymous function/closure.  
                    </p>
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
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=php&skin=desert"></script>
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