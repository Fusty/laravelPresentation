@extends('master')

@section('title')
    Foundation
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
                        <b>/tests/</b> who knows what goes here? Nobody tests applications. Just kidding!<br/>
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
                        examples for the various types of routing.
                    </p>
                </div>
            </div>

            <div id="closureroutes" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Closure Routes</h5>

                    <pre class="prettyprint">
Route::get('/', function () {
    return view('home');
});
                    </pre>
                    <p>
                        This is the barebones root route. Let's dissect it piece by piece.<br/><br/>

                        First we call get() function on the Route facade. This means we're only going to be handling get
                        requests with this specific route. Other options include <b>post()</b>, <b>put()</b>,
                        <b>patch()</b>, <b>delete()</b>, <b>resource()</b> and <b>any()</b>. The http verbs do what you
                        think, only route requests using that verb. The resource() method is special and will map all
                        http verbs to a RESTful controller with method names corresponding to the verbs. I'll go over
                        that example a bit later. The <b>any()</b> method accepts any http verb.<br/><br/>

                        Next we have the arguments for get(). The first argument is the url structure we want to
                        capture. In this case it's the root for this project. This argument takes strings like
                        "/home/user/userProfile".<br/><br/>

                        The second argument in this case is an anonymous function/closure. This is what will execute
                        upon reaching this route.<br/><br/>

                        The guts of this function should return something useful to the user. In this case it is
                        generating the view located at <b>/app/resources/views/home.php</b>. If you wanted to target a
                        view in a subdirectory of <b>/views/</b> you'd use the pattern <b>"view('directory.subdirectory.viewName')"</b>.<br/><br/>

                        That's a route! Look how simple it is! Let's look at a more advanced example.
                    </p>
                    <pre class="prettyprint">
Route::group(['middleware' => 'authLoggedIn'], function(){
    Route::get('user/{id}/profile', ['as' => 'userProfile', function ($id) {
        $data = array('user' => User::find($id));

        $data['userIsAdmin'] = User::isAdmin();

        return view('user.profile', $data);
    }]);

    Route::get('user/{id}/profile/json', ['as' => 'userProfile', function ($id) {
        return response()->json(User::find($id));
    }]);
});
                    </pre>
                    <p>
                        Whoa, got a lot going on all of a sudden. Let's break it down.<br/><br/>

                        First now we have <b>"Route::group()"</b>. That is a way to group the behavior of a bunch of
                        routes. In the first argument we have an array with one entry, "middleware". Middleware is a way
                        of running things before or after a request. In this case we're running the AuthLoggedIn
                        middleware we've defined elsewhere. Let's pretend all this middleware does is checks if the user
                        is logged in already (so they can view other user profiles) and if so passes them through,
                        otherwise it'd return an error view of some sort.<br/><br/>

                        Next is an anonymous function that will run as long as our middleware passes us
                        through.<br/><br/>

                        Inside this function we've got routes defined somewhat like before, two get routes but with
                        fancier url structure.<br/><br/>

                        The first route is capturing <b>user/{id}/profile</b> which could look like
                        <b>user/13/profile</b> for instance. <br/><br/>

                        The second argument is now an array instead of an anonymous function. Obviously the <b>get()</b>
                        method
                        is overloaded, yay flexiblity! In this array we have 2 entries one of which is named "as". The
                        as entry allows you to name routes. This is extremely handy when your application is new. You
                        might change how your url segments work, so if you use named routes and call those routes in
                        your views with their names you don't have to worry about your url segments changing. I suggest
                        you name all your routes just in case.<br/><br/>

                        The unnamed entry in this array is the closure that will execute upon reaching this route.
                        Notice is has an argument being passed in, <b>$id</b>. It matches the placeholder in the route
                        string <b>/user/{id}/profiel</b>. This is extremely useful and leads to pretty urls avoiding
                        ?param=val&param2=val2 stuff when not strictly necessary. So the user's id is passed via the
                        second url segment here.<br/><br/>

                        In the guts of the function we <b>find()</b> the user's entry within the <b>User</b> model. This
                        returns an easy to traverse object containing all the data for this row of the user table. I'm
                        sticking this in a data array for now. Next I lookup if the user is an admin and store that in
                        the data array as well. For now let's pretend we have an extra method on our <b>User</b> model
                        that determines this and is called <b>isAdmin()</b>. Finally we call the <b>user.profile</b>
                        view and feed it the data array. This is handy because every entry in the data array will become
                        a variable accessible by the view. I use this pattern on nearly all views that require some data
                        from the controller. The view then uses this data to render the user's profile.<br/><br/>

                        What's up with that second route? It just returns <b>response()->json(User::find($id))</b>. What
                        good is this? Well it reformats the <b>User</b> model object as a json object and returns this
                        as the response. Extremely handy for APIs or feeding data to ajax requests.<br/><br/>
                    </p>
                </div>
            </div>

            <div id="controllerroutes" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Controller Routes</h5>

                    <p>
                        Another way to execute logic based on routes is to pass on to a controller. Often you'll have
                        far too much logic to stuff into a close and wind up with a nice looking <b>routes.php</b> file.
                        Controllers to the rescue! Let's look at an example.
                    </p>

                    <pre class="prettyprint">
Route::get('user/{id}/profile', ['as' => 'userProfile', 'uses' => "UserController{{ "@profile" }}"]);
                    </pre>

                    <p>
                        In this example we're just rehashing the user profile route, but now we're passing it to the
                        <b>UserController</b> and specifically targeting the <b>profile()</b> method on that controller.
                        That's about it, the
                    </p>
                </div>
            </div>

            <div id="controllers" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Controllers</h4>

                    <p>
                        Controllers hold all of your request marshalling that won't fit or isn't appropriate for a
                        closure in <b>routes.php</b>. You should still encapsulte business logic elsewhere in a large
                        project, but I am of the opinion that it is fine to put business logic here if the project isn't
                        too big. In my first Laravel projects I put nearly all my business logic here and it worked
                        fine. It just might not be the most maintainable pile of crap.
                    </p>
                </div>
            </div>

            <div id="simplecontroller" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Simple Controller</h5>

                    <p>Controllers live in <b>/app/Http/Controllers/</b> and the naming convention is <b>SomethingController</b>.
                        Let's explore the <b>UserController</b> we referenced in the routes discussion above.
                    </p>

                    <pre class="prettyprint">
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     * Gleaned from Laravel 5 docs
     *
     * {{ "@param" }} int  $id
     * {{ "@return" }} Response
     */
    public function profile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
                    </pre>

                    <p>
                        So we're extending the base class <b>Controller</b>. This is common to all controllers. We have
                        a single function called <b>profile()</b> which takes a single parameter <b>$id</b>.<br/><br/>

                        It is basically replicating what we had in our closure, but now we can group other things
                        related to users within this controller which makes sense and will help keep things
                        organized.<br/><br/>

                        We are passing another array object to the view, this time we do it all in one line and also
                        call findOrFail() on the user model. Upon failure to find the user by the <b>$id</b> an
                        exception will be thrown and the response will continue to be handled by that specific exception
                        handler.
                    </p>
                </div>
            </div>

            <div id="restcontroller" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">REST Controller</h5>

                    <p>
                        RESTful controllers are awesome and artisan helps you scaffold them with a single command. Try
                        running <b>"php artisan make:controller ArticleController"</b>. It will create the
                        following scaffold for a RESTful controller.
                    </p>

                    <pre class="prettyprint">
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //Comments ommitted for brevity
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
                    </pre>
                    <p>
                        Neat, that was easy? Now what are all these functions and how do I use them?<br/><br/>

                        On <a href="http://laravel.com/docs/5.1/controllers#restful-resource-controllers">this page</a>
                        we have a reference table for which http verbs map to which methods. Let's create a simple route
                        to handle this so we can see the whole picture.<br/><br/>

                        <pre class="prettyprint">
Route::resource('article', 'ArticleController');
                        </pre>

                    That's all we need, which is awesome. This will handle all http verbs and all the extra segments you
                    see in the table linked above. Let's go over each method.<br/><br/>

                    index() is what happens when we hit <b>/article/</b> via GET. Usually what you'd do here is
                    return a listing of all the resources. You might want to display only the ones a user has permission
                    to view and you might want to return this as a json object (I know I usually do!). You can do all of
                    this conditionally of course, you are in control of what goes in the function body. The main idea is
                    that this is all routed based on "standard" REST semantics.<br/><br/>

                    create() is what happens when we hit <b>/article/create</b> via GET. This usually returns the
                    form with which you'll be submitting new resources. This isn't always appropriate (imagine you're
                    form is encapsulated within angular or something) but is mega handy if you restrict access to it to
                    administrators so you can add data easily without much of a front end. You'll have to make this
                    function render an appropriate form though.<br/><br/>

                    store($request) is what happens when we hit <b>/article/</b> via POST. This is always how
                    you'll create
                    new resources. It should accept the action of the form you returned in the create() method. You'll
                    be writing a new row to your model assuming you're happy with all the data submitted.<br/><br/>

                    show($id) is what happens when we hit <b>/article/{id}</b> via GET. Here you'll return this
                    specific resource in some way. I usually just do JSON but like before you can decide how you want to
                    do this, and do this conditionally based on user permissions or if it was an ajax request or not.

                    edit($id) is what happens when we hit <b>/article/{id}/edit</b> via GET. Usually you'll return
                    a
                    prepopulated form for the user to edit this specific resource record. Once again this may or may not
                    be appropriate depend on your app. And once again it's useful to include it if only so you as an
                    admin can quickly edit existing records.<br/><br/>

                    update($request, $id) is what happens when we hit <b>/article/{$id}</b> via PUT or PATCH. This
                    is where your action from the above edit form should go. Here you'll lookup the resource from it's
                    model, make the changes if you are happy with them and update the row in the table.<br/><br/>

                    destroy($id) is what happens when we hit <b>/article/{$id}</b> via DELETE. This should delete
                    this specific record. Pretty simple and obvious.<br/><br/>

                    So RESTful controllers are a snap with Laravel. They're FANTASTIC things to set up for almost any
                    webapp with multiple resource types. If you ever decide to open up your data to the public you've
                    got almost all the work done if you've made your app work based on a RESTful service like this in
                    the first place.
                    </p>
                </div>
            </div>

            <div id="controllerconstructors" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Controller Constructors</h5>

                    <p>
                        Controllers are just classes and by that nature they can have user defined constructors. This is
                        awesome because if you group your controller methods sensibly you can set up their dependencies
                        intelligently in the constructor. You can also call middleware here, which is handy and makes
                        your routes look less cluttered, though it isn't appropriate when you are grouping behavior on
                        something other than the controller (for instance admin authorization on routes that span
                        multiple controllers).<br/><br/>

                        One nice thing Laravel does for you is automagically resolve dependencies passed into the
                        constructor. Say you have the below constructure;

                        <pre class="prettyprint">
public function __construct(Mailer $mailer)
{
    $this->mailer = $mailer;
}
                        </pre>

                    <p>
                        Here we're injecting the application's current Mailer driver. The driver is configured in <b>/config/mail.php</b>.
                        But you don't really need to worry about that part in the constructor because the type hinted
                        parameter lets the framework resolve the proper dependency with fancy processes I know almost
                        nothing about!<br/><br/>

                        This works for other depencies other than things prepacked with the framework too. I'll explain
                        some of that when we go over the mythical IoC container.
                    </p>
                    </p>
                </div>
            </div>

            <div id="models" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Models</h4>

                    <p>
                        It's Models time! Models are your gateway to your sweet sweet data.
                    </p>
                </div>
            </div>

            <div id="simplestmodel" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Simplest Model</h5>

                    <p>
                        Let's take a look at a super simple model. We'll make it for the <b>Article</b> resource we
                        used earlier. Let's use artisan to generate it via <b>"php artisan make:model Article"</b>.
                        We end up with the following;
                    </p>

                    <pre class="prettyprint">
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

}
                    </pre>

                    <p>
                        Wow, that is . . . minimal. Does it even work? The answer is yes . . . but it does depend on
                        some other things being true. First off when you don't specify a table name for a model it will
                        assume the table is named the plural snake-case version of the model name. In this case <b>Article</b>
                        simply becomes <b>articles</b>. It also assumes your primary key is a column named simply
                        <b>'id'</b>, that you have timestamp fields named <b>'created_at'</b> and <b>'updated_at'</b>
                        and that you are using the primary database connection configured in <b>/config/database.php</b>.<br/><br/>

                        Neat, if you have really simple data this works with incredibly little effort. What do you do if
                        the table name is different? Or the primary key? Let's look at a more verbose example;
                    </p>

                    <pre class="prettyprint">
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'article_id';
    protected $dateFormat = 'U';
    protected $connection = 'alternate-connection';
}</pre>
                    <p>
                        Ok, this makes more sense. We're associating this with a table named <b>'articles'</b> with
                        a primary key of <b>'article_id'</b> (ugh, don't use this case convention please). We're
                        changing the default time format to be seconds since Unix Epoch (midnight January 1st 1970).
                        We've also just specified that the database is whatever we've configured in <b>/config/database.php</b>
                        under <b>'alternate-connection'</b>.<br/><br/>

                        Cool, so what can we do with this model? Well, we can start pushing and pulling data in and out
                        of the model. Assuming you know all the columns and stuff. Let's look at a simple closure route
                        that spits out the first 5 records it finds.
                    </p>

                    <pre class="prettyprint">
Route::get('/articleTest', function(){
    $fiveResources = App\Article::take(5)->get();

    return response()->json($fiveResources);
});
                    </pre>

                    <p>
                        Sweet, we're using Eloquent now. Eloquent is the ORM (Object Relational Model) we use to snag
                        data from our models. <b>take()</b> it like SQL's LIMIT so we're just grabbing the first 5
                        records it
                        finds (due to natural sort it'll be the lowest primary key values) and the <b>get()</b> function
                        actually performs the query and returns the resulting collection. We format the collection as
                        JSON and return that as the response body. Pretty simple, but now you can see how easy hooking
                        up to a database can be.
                    </p>
                </div>
            </div>

            <div id="relations" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Relations</h5>

                    <p>
                        Relations are awesome. I mean, we're using relational databases so we better be able to define
                        neato relations. But how do we do that with Eloquent and Models? Let's set up some relations and
                        expand upon our <b>Article</b> example. We'll assume there's another resource called <b>SubArticle</b>.
                    </p>

                    <pre class="prettyprint">
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    public function subArticle(){
        return $this->hasOne('App\SubArticle');
        //or
        return $this->hasOne('App\SubArticle', 'article_id');
        //or
        return $this->hasOne('App\SubArticle', 'article_id', 'id');
    }

    public function users(){
        return $this->hasMany('App\User');
        //or
        return $this->hasMany('App\User', 'article_id');
        //or
        return $this->hasMany('App\User', 'article_id', 'id');
    }
}</pre>

                    <p>
                        We've defined two relations here. <b>subArticle()</b> is One to One. That means one
                        record of <b>Article</b> maps to one record of <b>SubArticle</b>. We can use this
                        function to find
                        any <b>Article</b>'s <b>SubArticle</b>.<br/><br/>

                        <b>users()</b> is a one to many relation, meaning any <b>Article</b> might be associated
                        with any number of <b>User</b>s. This is why the function name is plural, because it might
                        return any number of related users.

                        How do we use these? Let's demonstrate on a simple closure route;
                    </p>

                    <pre class="prettyprint">
Route::get('/articleRelationTest', function(){
    //Get a Article to play with, let's grab the first one it finds
    $theArticle = App\Article::first();

    //Get it's paired SubArticle if it exists
    //We'll get this with the relation method we just defined in the model
    $theSubArticle = $theArticle->subArticle();

    //Let's get all the users associated with this resource, if any
    $theArticlesUsers = $theArticle->users();


    //Let's do this without the extra steps, I want the othe resource and users nested in one Article object
    $theArticle = App\Article::with('subArticle', 'users')->take(20)->get();

    return response()->json($theArticle);
});
                    </pre>

                    <p>
                        Now that's awesome. We'll end up with 20 objects that represents <b>a</b>s. Those will
                        have all the properties/columns <b>Article</b> has plus a property for
                        <b>SubArticle</b> (a model object of that type) and another property for <b>User</b>s (a
                        collection of model objects of that type). Check out <a
                                href="{{ url('/articleRelationTest') }}">this example</a>.<br/><br/>

                        There are more to relations than just this. You can define the inverse of these relations, and
                        there is a lot of shorthand and fancy loading methods for these to avoid queryception. We'll
                        save that for the app building portion of this talk.
                    </p>
                </div>
            </div>

            <div id="shortcutfunctions" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Shortcut Functions</h5>

                    <p>
                        Wah, this isn't good enough. Wahhh, I don't want to repeat myself. Ok, you friggin' baby. Let's
                        write some shortcuts so you don't have to strain your infant mind (whoa, I need to wait until my
                        coffee kicks in!). Let's start with an example; <span style="color:#d5d5d5">an example for babies maybe;</span>
                    </p>

                    <pre class="prettyprint">
class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    //Let's store userCount as a property so we don't rerun the query if we've already grabbed this
    private $userCount;

    public function subArticle(){
        //...
    }

    public function users(){
        //...
    }

    public function userCount(){
        if ($this->userCount != null) {
            return $this->userCount;
        } else {
            $this->userCount = $this->users()->count();
            return $this->userCount;
        }
    }
}                    </pre>
                    <p>
                        Cool, that looks pretty easy. There's an extra step to make sure we only run the query to get
                        the count once. Nice! Let's use it.
                    </p>

                    <pre class="prettyprint">
Route::get('/articleUserCount', function(){
    //Let's list the user counts for each resource.
    $output = '';

    foreach(App\Article::all() as $article){
        $output .= "Article #".$article->id." has " . $article->userCount() . " users associated with it.<br/><br/>";
    }

    return $output;
});                    </pre>

                    <p>
                        Cool, so we're just looping through all the <b>Article</b> records and spitting out a
                        formatted line about the user count. <a href="{{ url('/articleUserCount') }}">See the
                            output here</a>
                    </p>

                </div>
            </div>

            <div id="validationrules" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Validation Rules</h5>

                    <p>
                        Validation rules are a commonly needed when users aren't expected to be perfect. You'll often
                        want to validate the user input before you stuff it into the database. Make sure emails are
                        emails, numbers are numbers and of course define your own!<br/><br/>

                        First of all where should validation rules go? I think they should stay attached to whatever
                        they are validating. Are they validating data that goes into your model? Are the rules unique to
                        this specific model? Then just make them a property of the model. For this example let's assume
                        <b>Article</b> has the following columns; id, title, body, subArticle_id and the
                        standard timestamps.
                    </p>

                    <pre class="prettyprint">
class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    public $rules = array(
        'title' => 'required|unique:posts|max:255',
        'body'  => 'required');

    // . . .  all the other stuff we already saw for this model
                    </pre>

                    <p>
                        Wow, nice array, how do we actually use it? Ok let's assume we'll be POSTing to a route that
                        will create a new <b>Article</b> and we'll be POSTing the title and body along as well. We need
                        to invoke the validator on that user input and if it passes validation write the new records.
                    </p>

                    <pre class="prettyprint">
Route::post('/newArticle', function () {
    $validator = Validator::make(Request::only(['title', 'body']), [
        'title' => 'required|unique:articles|max:255',
        'body' => 'required',
    ]);

    if ($validator->fails()) {
        return "Nope, that didn't go so well";
    }

    return "Successfully wrote that new article! (actually I skipped the creation step so I can re-use this hidden form, just pretend I did)";
});                    </pre>

                    <p>
                        Ok, so first off we have a <b>POST</b> route which lines up with resource creation. Secondly
                        we've got a closure with some validation going on. We call the static method <b>make()</b> on
                        the validator and feed it two arguments. First is the user input (in this case I specifically
                        pluck the title and body from the request object). Second is the rules array. Notice I have <b>unique:articles</b>
                        in there. This means the validator will hit the <b>articles</b> table and check that our new
                        title is unique. The rest is self explanatory.<br/><br/>

                        Test it out <a href="{{ url('/newArticlePostForm') }}">here.</a> I skip the step of actually
                        writing to the table, but I do run the validator. You can see an error message when it
                        fails.<br/><br/>

                        Didn't I say you should put the rules on the model earlier? Let's see how to do that.
                    </p>

                    <pre class="prettyprint">
///////////////////////
//  App/Article.php  //
///////////////////////
class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    public static $rules = [
        'title' => 'required|unique:articles|max:255',
        'body' => 'required',
    ];
...


///////////////////////////
//  App/Http/routes.php  //
///////////////////////////
Route::post('/newArticle', function () {
    $validator = Validator::make(Request::only(['title', 'body']), App\Article::$rules);
...                    </pre>

                    <p>
                        So first we put a public static variable on the Article model class. This makes it so we can
                        access that model's rules without any instances of the class. Next, in the closure where we call
                        the validator we just feed it that variable instead of the array defined inline. Easy peasy, my
                        rules always live in that same spot. All that changes is the model name. You could even have
                        multiple sets of rules if say administrators are allowed more relaxed input validation. Just add
                        another public static variable.
                    </p>
                </div>
            </div>

            <div id="multipledatabaseaccess" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Multiple Database Access</h5>

                    <p>
                        Do you have content in multiple databases? Don't want to specify which database before each
                        model
                        reqeust? No problem! You can associate your model with a specific database connection defined in
                        <b>config/database.php</b>.
                    </p>

                    <pre class="prettyprint">
class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $connection = 'someAlternativeDatabaseConnection';
...</pre>
                    <p>
                        All we need to do is specify the connection name. It should match the connection name in <b>config/database.php</b>.
                    </p>
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

                    <p>
                        What an odd question. You view when you create views! A view is just rendered content. Rendering
                        content comes dead last most of the time. There are ways to push the view back to the user and
                        then continue doing things, but that's not generally how the PHP request cycle works. Usually it
                        goes application bootstrap -> routing/middleware -> controller logic (may leverage business
                        logic and/or model data) -> view -> return view to user.<br/><br/>
                    </p>
                </div>
            </div>

            <div id="whatgoesintheview" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">What goes in the view?</h5>

                    <p>Rendered content does! It's pretty simple since we have sucha nice templating language. it is
                        called Blade, and it is awesome. I'll explain momentarily . . .</p>
                </div>
            </div>

            <div id="bladetemplating" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Blade Templating</h5>

                    <p>
                        Blade templating is huge. It is my absolute favorite way to quickly crank out HTML content at
                        this point. Let's take a look at some simple control structures you can use with Blade. Let's
                        write out a unordered list with some useless stuff in it.
                    </p>

                    <pre class="prettyprint">
{!! '&#x3C;&#x75;&#x6C;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x6F;&#x75;&#x72;&#x4C;&#x69;&#x73;&#x74;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x40;&#x66;&#x6F;&#x72;&#x65;&#x61;&#x63;&#x68;&#x28;&#x72;&#x61;&#x6E;&#x67;&#x65;&#x28;&#x30;&#x2C;&#x31;&#x35;&#x29;&#x20;&#x61;&#x73;&#x20;&#x24;&#x69;&#x6E;&#x64;&#x65;&#x78;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x69;&#x3E;&#x49;&#x74;&#x65;&#x6D;&#x20;&#x23;&#x7B;&#x7B;&#x20;&#x24;&#x69;&#x6E;&#x64;&#x65;&#x78;&#x20;&#x7D;&#x7D;&#x3C;&#x2F;&#x6C;&#x69;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x40;&#x65;&#x6E;&#x64;&#x66;&#x6F;&#x72;&#x65;&#x61;&#x63;&#x68;&#xA;&#x3C;&#x2F;&#x75;&#x6C;&#x3E;' !!}
                    </pre>

                    <p>
                        What's going on here? First we have a foreach looking thing with an {{ "@" }} symbol out front.
                        That's just a foreach loop, the {{ "@" }} symbol is Blade's standard escape/prefix. We need to
                        put an endforeach in there as well. A little extra verbose language never hurt anyone, right?
                        Next we've got an <b>li</b> element inside. The condition in the foreach looks like we should
                        generate 16 <b>li</b> elements. Neatly ordered . . . kinda like this . . .
                    </p>

                    <ul id="ourList">
                        @foreach(range(0,15) as $index)
                            <li>Item #{{ $index }}</li>
                        @endforeach
                    </ul>

                    <p>
                        You have access to <b>&commat;if(), &commat;elseif()</b> and other common PHP control
                        structures.<br/><br/>
                        You also get access to some cool ones too like <b>&commat;forelse()</b>. A forelse loop is just
                        like a foreach loop except it has an <b>else</b> block of code that only executes if the object
                        the foreach was operating on has a zero count. Very handy for when a collection comes back
                        empty.<br/><br/>

                        You probably also noticed the curly braces. Those allow you to echo text into the template. It
                        automagically echoes out whatever executes, be it a variable or a call to a method
                        somewhere.<br/><br/>

                        You can also nest templates within one another. Simply <b>&commat;include('view.name')</b> and
                        it'll pull in that view. You can also do things like setup a master template that has areas for
                        the header, content and footer and refence that for all your pages. That is how I made this
                        guide. All the pages are built off a master template. The basic framework for each page's view
                        looks like this.
                    </p>

                    <pre class="prettyprint">
&#x40;&#x65;&#x78;&#x74;&#x65;&#x6E;&#x64;&#x73;&#x28;&#x27;&#x6D;&#x61;&#x73;&#x74;&#x65;&#x72;&#x27;&#x29;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x53;&#x6F;&#x6D;&#x65;&#x20;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x20;&#x68;&#x65;&#x72;&#x65;&#x21;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x68;&#x65;&#x61;&#x64;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x7B;&#x7B;&#x2D;&#x2D;&#x50;&#x65;&#x72;&#x68;&#x61;&#x70;&#x73;&#x20;&#x61;&#x20;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x20;&#x6F;&#x72;&#x20;&#x6C;&#x69;&#x6E;&#x6B;&#x20;&#x73;&#x6F;&#x6D;&#x65;&#x20;&#x63;&#x73;&#x73;&#x20;&#x68;&#x65;&#x72;&#x65;&#x2C;&#x20;&#x69;&#x74;&#x20;&#x77;&#x69;&#x6C;&#x6C;&#x20;&#x62;&#x65;&#x20;&#x69;&#x6E;&#x20;&#x74;&#x68;&#x65;&#x20;&#x3C;&#x68;&#x65;&#x61;&#x64;&#x3E;&#x3C;&#x2F;&#x68;&#x65;&#x61;&#x64;&#x3E;&#x20;&#x74;&#x61;&#x67;&#x2D;&#x2D;&#x7D;&#x7D;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x72;&#x6F;&#x77;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x63;&#x6F;&#x6C;&#x20;&#x73;&#x31;&#x30;&#x20;&#x6F;&#x66;&#x66;&#x73;&#x65;&#x74;&#x2D;&#x73;&#x31;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x70;&#x3E;&#x52;&#x69;&#x76;&#x65;&#x74;&#x69;&#x6E;&#x67;&#x20;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x20;&#x67;&#x6F;&#x65;&#x73;&#x20;&#x68;&#x65;&#x72;&#x65;&#x21;&#x3C;&#x2F;&#x70;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x7B;&#x7B;&#x2D;&#x2D;&#x50;&#x65;&#x72;&#x68;&#x61;&#x70;&#x73;&#x20;&#x61;&#x20;&#x61;&#x20;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x20;&#x6F;&#x72;&#x20;&#x73;&#x6F;&#x6D;&#x65;&#x74;&#x68;&#x69;&#x6E;&#x67;&#x2D;&#x2D;&#x7D;&#x7D;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;                    </pre>

                    <p>
                        So I call the master template with <b>&commat;extends('master')</b>. All of the <b>&commat;section()</b>
                        blocks will have a corresponding <b>&commat;yield()</b> line in the master template. It is at
                        these points that the view's content will be inserted into the master template. The master
                        template looks like this;
                    </p>

                    <pre class="prettyprint">
&#x3C;&#x21;&#x44;&#x4F;&#x43;&#x54;&#x59;&#x50;&#x45;&#x20;&#x68;&#x74;&#x6D;&#x6C;&#x3E;&#xA;&#x3C;&#x68;&#x74;&#x6D;&#x6C;&#x3E;&#xA;&#x3C;&#x68;&#x65;&#x61;&#x64;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x3E;&#x40;&#x79;&#x69;&#x65;&#x6C;&#x64;&#x28;&#x27;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x27;&#x29;&#x3C;&#x2F;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x69;&#x6E;&#x6B;&#x20;&#x68;&#x72;&#x65;&#x66;&#x3D;&#x22;&#x68;&#x74;&#x74;&#x70;&#x3A;&#x2F;&#x2F;&#x66;&#x6F;&#x6E;&#x74;&#x73;&#x2E;&#x67;&#x6F;&#x6F;&#x67;&#x6C;&#x65;&#x61;&#x70;&#x69;&#x73;&#x2E;&#x63;&#x6F;&#x6D;&#x2F;&#x69;&#x63;&#x6F;&#x6E;&#x3F;&#x66;&#x61;&#x6D;&#x69;&#x6C;&#x79;&#x3D;&#x4D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x2B;&#x49;&#x63;&#x6F;&#x6E;&#x73;&#x22;&#x20;&#x72;&#x65;&#x6C;&#x3D;&#x22;&#x73;&#x74;&#x79;&#x6C;&#x65;&#x73;&#x68;&#x65;&#x65;&#x74;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x69;&#x6E;&#x6B;&#x20;&#x72;&#x65;&#x6C;&#x3D;&#x22;&#x73;&#x74;&#x79;&#x6C;&#x65;&#x73;&#x68;&#x65;&#x65;&#x74;&#x22;&#x20;&#x68;&#x72;&#x65;&#x66;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x55;&#x52;&#x4C;&#x3A;&#x3A;&#x74;&#x6F;&#x28;&#x27;&#x63;&#x73;&#x73;&#x2F;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x69;&#x7A;&#x65;&#x2E;&#x63;&#x73;&#x73;&#x27;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#xA;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6D;&#x65;&#x74;&#x61;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x76;&#x69;&#x65;&#x77;&#x70;&#x6F;&#x72;&#x74;&#x22;&#x20;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x3D;&#x22;&#x77;&#x69;&#x64;&#x74;&#x68;&#x3D;&#x64;&#x65;&#x76;&#x69;&#x63;&#x65;&#x2D;&#x77;&#x69;&#x64;&#x74;&#x68;&#x2C;&#x20;&#x69;&#x6E;&#x69;&#x74;&#x69;&#x61;&#x6C;&#x2D;&#x73;&#x63;&#x61;&#x6C;&#x65;&#x3D;&#x31;&#x2E;&#x30;&#x22;&#x2F;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x40;&#x79;&#x69;&#x65;&#x6C;&#x64;&#x28;&#x27;&#x68;&#x65;&#x61;&#x64;&#x27;&#x29;&#xA;&#x3C;&#x2F;&#x68;&#x65;&#x61;&#x64;&#x3E;&#xA;&#xA;&#x3C;&#x62;&#x6F;&#x64;&#x79;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x70;&#x61;&#x67;&#x65;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x69;&#x6E;&#x63;&#x6C;&#x75;&#x64;&#x65;&#x28;&#x27;&#x6E;&#x61;&#x76;&#x27;&#x29;&#xA;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x70;&#x61;&#x67;&#x65;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x79;&#x69;&#x65;&#x6C;&#x64;&#x28;&#x27;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x69;&#x6E;&#x63;&#x6C;&#x75;&#x64;&#x65;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x65;&#x72;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x74;&#x65;&#x78;&#x74;&#x2F;&#x6A;&#x61;&#x76;&#x61;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x22;&#x20;&#x73;&#x72;&#x63;&#x3D;&#x22;&#x68;&#x74;&#x74;&#x70;&#x73;&#x3A;&#x2F;&#x2F;&#x63;&#x6F;&#x64;&#x65;&#x2E;&#x6A;&#x71;&#x75;&#x65;&#x72;&#x79;&#x2E;&#x63;&#x6F;&#x6D;&#x2F;&#x6A;&#x71;&#x75;&#x65;&#x72;&#x79;&#x2D;&#x32;&#x2E;&#x31;&#x2E;&#x31;&#x2E;&#x6D;&#x69;&#x6E;&#x2E;&#x6A;&#x73;&#x22;&#x3E;&#x3C;&#x2F;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x20;&#x73;&#x72;&#x63;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x55;&#x52;&#x4C;&#x3A;&#x3A;&#x74;&#x6F;&#x28;&#x27;&#x6A;&#x73;&#x2F;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x69;&#x7A;&#x65;&#x2E;&#x6D;&#x69;&#x6E;&#x2E;&#x6A;&#x73;&#x27;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#x3C;&#x2F;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x40;&#x79;&#x69;&#x65;&#x6C;&#x64;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x27;&#x29;&#xA;&#x3C;&#x2F;&#x62;&#x6F;&#x64;&#x79;&#x3E;&#xA;&#x3C;&#x2F;&#x68;&#x74;&#x6D;&#x6C;&#x3E;&#xA;                    </pre>

                    <p>
                        Ok, some standard HTML 5 template stuff, pulling in some scripts and css, and some <b>&commat;yield()</b>s
                        as well. Each <b>&commat;yield()</b> corresponds to a possible <b>&commat;section()</b> within
                        the calling template. Notice I have <b>&commat;yield('footer')</b> but I never call that from
                        the template that is extending master above. Providing <b>&commat;section()</b>s for <b>&commat;yield()</b>s
                        is optional.<br/><br/>

                        You can create some pretty badass modular views with this system. It is intensely useful. I
                        really am not giving Blade enough time here, but that is because I could do an entire talk on
                        Blade tricks and we need to move on to more of Laravel!
                    </p>
                </div>
            </div>

            <div id="migrations" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h4 class="laravel-red">Migrations</h4>

                    <p>
                        Migrations are awesome and many of you are probably familiar with them already. For those that
                        aren't, migrations and migrating is just a method of generating your database's tables with the
                        code you are writing your application in. In this case all migrations will be written in PHP,
                        which is handy because we are good at PHP. If you suck at SQL you might find migrations more
                        inviting. <br/><br/>
                    </p>
                </div>
            </div>

            <div id="migrationsrocktoohard" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Migrations Rock Too Hard</h5>

                    <p>
                        Migrations are way to record the state of your tables in code. If you code it so your
                        table has 10 columns, all of which are required, then every time you rerun your migration it
                        will end up that way. If a collaborate works on your code, they just need a database with
                        access, and your migrations will setup all the necessary tables for the app. No dump, restore,
                        truncate process.<br/><br/>

                        If you change the table structure you simply change your migration code and rerun the migration.
                        You won't have to remember you made that change in the future when you pass the project on to a
                        collaborator, or push it to production.
                    </p>
                </div>
            </div>

            <div id="basicmigration" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Basic Migration</h5>

                    <p>
                        Let's take a look at a basic migration. We'll setup our <b>articles</b> table now.
                    </p>

                    <pre class="prettyprint">
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->integer('subArticle_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('articles');
    }
}</pre>
                    <p>
                        Neat, we have a class that is named in a pretty straightforward way. We have 2 methods, up and
                        down. This corresponds to running the migration and rolling the migration back respectively. In
                        the down all we do is drop the table, but if you wanted you could do anything here. I would
                        expect the table to get dropped, but maybe you want to dump it's contents to a file first just
                        to be safe. That is totally possible here.<br/><br/>

                        The up method is much more interesting. Looks like it's technically a one-liner. We have <b>Schema::create()</b>
                        being called with 2 parameters. First parameter is the table name and the second is a closure
                        that should return a table definition. We're passing in a <b>$table</b> dependency that will
                        automagically resolve to a <b>Blueprint</b> type. This all happens automagically because you
                        might be using different database drivers on different projects, and <b>Blueprint</b> abstracts
                        this away.<br/><br/>

                        Inside this closure we seem to just be calling column-type named functions on the <b>$table</b>
                        object. This does what you think, first we setup an incrementing integer field called <b>id</b>.
                        Next two string fields named <b>title</b> and <b>body</b>. We have an integery field of <b>subArticle_id</b>
                        which will hold the one to one relationship we defined early. Finally we have the timestamps
                        which will insert the <b>created_at</b> and <b>updated_at</b> fields as well.<br/><br/>

                        How awesome is that?! You can take a glance at this migration and boom, you know the table
                        structure. No poking around with a sql tool checking all the columns, nope, just some php in the
                        project you're already working on. Nice and simplified too. Migrations rock. I didn't use them
                        early enough.
                    </p>
                </div>
            </div>

            <div id="advancedmigration" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Advanced Migration</h5>

                    <p>
                        You can write migrations that do ANYTHING to your database. This means you can have migrations
                        that update table structure. I can't imagine this is too commonly used, but just imagine how
                        this could speed up patching already deployed systems if you needed to change database structure
                        on the fly. If you tested everything and new it would work, you'd simply run one command on the
                        production server to hit that one migration and it could handle all the data validation and
                        whatnot necessary to add the column.<br/><br/>

                        You can also set up foreign key relationships in a migration. This includes <b>on delete</b> or
                        <b>on update</b> behavior as well.
                    </p>
                </div>
            </div>

            <div id="seeding" class="section scrollspy row">
                <div class="col s12 m10 l8">
                    <h5 class="laravel-red">Seeding</h5>

                    <p>
                        Seeding makes testing an application much more rewarding. Are you sick of manually entering a
                        bunch of dummy data when you start up an app? Fake Fakerson2, Fake Fakerson3 etc. all by hand?
                        Well stop it, use seeders!<br/><br/>

                        Seeding just means writing some rows to your tables after your migrations run. You can seed a
                        table so there's at least some data for development and testing. You can seed a database with
                        data from another database if say your app is going to replace another and will need to ingest
                        all the data from the old database. Seeding is awesome, and you should probably be doing it too.<br/><br/>

                        What does a seeder look like? Let's look at how I seeded Articles and SubArticles for this
                        demonstration;
                    </p>

                    <pre class="prettyprint">

use Illuminate\Database\Seeder;
use App\Article;
use App\SubArticle;

class BothResourcesTablesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        //These need to be associated with one another, so seed them both at once!
        foreach(range(1,100) as $index)
        {
            $article = Article::create(array(
                    'title' => $faker->title,
                    'body' => $faker->text,
                    'created_at' => $faker->dateTimeThisMonth
            ));

            $subArticle = SubArticle::create(array(
                    'title' => $faker->title,
                    'body' => $faker->text,
                    'created_at' => $faker->dateTimeThisMonth
            ));

            //Link the two together so the one to one works
            $article->subArticle_id = $subArticle->id;
            $article->save();
            $subArticle->article_id = $article->id;
            $subArticle->save();
        }

    }
}
                    </pre>

                    <p>
                        Normally you would just write one seeder for each table. However, in this case I am writing one
                        seeder for the two tables because I want to setup the one to one relationship as I seed the
                        tables. Let's dissect this seeder.<br/><br/>

                        First we just have one function <b>run()</b> which will handle everything. Next it looks like
                        i'm calling a third party package that generates fake data. This specific package is excellent
                        btw, I use it all the time. Next I am inside a foreach loop that will run 100 times, each time
                        creating two arrays of <b>Article</b>s and
                        <b>SubArticle</b>s by calling the <b>create()</b> method each respective model. Lastly before
                        the loop is complete I associate each record with each other using the expected <b>id</b>s and
                        save those records to the table. When everything is said and done this should write 100 rows to
                        the <b>articles</b> table and 100 rows to the <b>subarticles</b> table as well, and they'll all
                        have one to one relationships that will work with what we've defined on our model. Yay! Seeding!<br/><br/>

                        How do you run these seeders? Well there is a default seeder file called <b>app/database/seeds/DatabaseSeeder.php</b>.
                        It should have a single call to each of your seeders. When you run <b>php artisan db:seed</b>
                        that file is called and will run all the seeders it references. If you want to run a specific
                        seeder run <b>php artisan db:seed --class=ClassNameGoeshere</b>. If you want to clobber
                        everything in your database and start from fresh with new tables and seeded data run <b> php
                            artisan migrate:refresh --seed</b>. I love that command.
                    </p>

                    <h5 class="laravel-red">There is so much more . . .</h5>

                    <p>
                        I have only scratched the surfaced and given you the basics necessary to get started with
                        Laravel. There are so many interesting and useful things in Laravel include, but not limited to;
                        <ul>
                            <li>Job queueing</li>
                            <li>Automatic Form Repopulation</li>
                            <li>Automatic Pagination of Model Results/Anything</li>
                            <li>Easy Localization</li>
                            <li>Authentication helpers</li>
                            <li>Filesystem/Cloud Storage helpers</li>
                            <li>SSH Based Taskrunner</li>
                            <li>Events</li>
                            <li>Logging</li>
                            <li>Built-in Billing</li>
                            <li>Testing tools</li>
                            <li>And soooooooo much more . . .</li>
                        </ul>
                    </p>


                    <h5 class="laravel-red">Wow, let's do something with all of this!</h5>
                    <a href="{{ url('demo') }}" class="waves-effect waves-light btn-large">DO
                        SOMETHING</a>

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