@extends('master')

@section('title')
    Demo
@endsection

@section('head')
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m8 offset-m1">
            <div class="row">
                <h2 class="materialize-red-text text-lighten-2">Application Build Demo</h2>

                <div class="row">
                    <div id="purpose" class="section scrollspy">
                        <h4 class="laravel-red">Purpose of App</h4>

                        <p>
                            What should this thing do? Let's continue with our Articles and SubArticles theme. So we'll
                            need a way to input articles and subArticles. We'll want a way to link an article to a
                            subarticle as well as a way to optionally link an article to users (users will be seeded and
                            we'll
                            stick with them). Finally all of these articles will show up in a paginated article browser.<br/><br/>
                            Let's start off by writing all the routes we will need to accomplish this. I love starting
                            with routing.
                        </p>

                    </div>
                </div>
                <div class="row">
                    <div id="routes" class="section scrollspy">
                        <h4 class="laravel-red">Routes</h4>

                        <pre class="prettyprint">
Route::resource('demo/article', 'ArticleController');

Route::resource('demo/subArticle', 'SubArticleController');

Route::get('demo/browser', 'DemoController&commat;index');

Route::get('demo/associateSubArticle/{articleId}/{subArticleId}', 'DemoController&commat;associateSubArticle');

Route::get('demo/associateUsers/{articleId}/{userId}', 'DemoController&commat;associateUsers');</pre>

                        <p>
                            So the <b>'demo/article'</b> resource route should handle RESTful calls and basically
                            everything we need for Articles. The <b>'demo/subArticle'</b> resource route will do the
                            same for SubArticles. The <b>'demo/browser'</b> route will be where we browse for articles,
                            maybe displaying a snippet of each below their title. The last two routes we'll use to
                            associate Articles with SubArticles and Articles with Users respectively. We'll just cram
                            all the data we need for those right into the url.<br/><br/>

                            Cool, now that we know what happens after we hit the router let's go to the next step. The
                            controllers!
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div id="articleController" class="section scrollspy">
                        <h4 class="laravel-red">Articles Controller</h4>

                        <p>
                            From the routes above we can see we're going to need an ArticleController, a
                            SubArticleController and a DemoController. Let's start with the ArticleController.<br/><br/>

                            First I will run <b>"php artisan make:controller ArticleController"</b>. This will create a
                            scaffold of a controller at <b>app/Http/controllers/ArticleController.php</b>. Let's fill
                            out this controller and then dissect it.
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
        //We won't need this route, but it would normally be a list of all Articles
    }

    public function create()
    {
        //The form for creating a new article.
        return view('demo.articleCreationForm');
    }

    public function store(Request $request)
    {
        //Do validation
        $validator = Validator::make(Request::only(['title', 'body']), App\Article::$rules);
        if ($validator->fails()) {
            return "Something was wrong with your title or body, please try again";
        }

        //Write to database
        $article = new Article();
        $article->title = Request::title;
        $article->body = Request::body;
        $article->save();

        //Push user to new article page
        return Redirect::to('demo/article/'.$article->id);
    }

    public function show($id)
    {
        //This is what the browser page will link to for individual articles
        $article = Article::with('subArticle', 'users')->findOrFail($id);

        return view('demo.showArticle', ['article' => $article]);
    }

    public function edit($id)
    {
        //The form for editing a new article.
        return view('demo.articleEditForm');
    }

    public function update(Request $request, $id)
    {
        //Updates an existing article from the above form

        //Do validation
        $validator = Validator::make(Request::only(['title', 'body']), App\Article::$rules);
        if ($validator->fails()) {
            return "Something was wrong with your title or body, please try again";
        }

        //Update this record
        $article = Article::findorFail($id);
        $article->title = Request::title;
        $article->body = Request::body;
        $article->save();

        //Push user to the article page
        return Redirect::to('demo/article/'.$id);
    }

    public function destroy($id)
    {
        //Deletes an existing article
        Article::where('id', $id)->delete();
    }
}

                        </pre>

                        <p>
                            First off we're ignoring the <b>index()</b> method. We're just not using it in this example.
                            Next we've got the <b>create()</b> method. Here we will show the user the Article creation
                            form. Next is the <b>store()</b> method which accepts the action of the form from <b>create()</b>.
                            It performs validation and writes new Articles to the table. Next up is the <b>show()</b>
                            method which we will use to show a specific article. In this we just call the appropriate
                            view and feed it this article with it's relations loaded alongside. Next is the
                            <b>edit()</b> method which shows the user the Article editing form. After that is the <b>update()</b>
                            method which ingests the form from <b>edit()</b> and writes to the table. Lastly there is
                            the <b>destroy()</b> method which is self explanatory.<br/><br/>

                            That was pretty minimal, now we can manipulate Article resources! We just need to write a
                            couple of views to handle the forms and displaying the article detail. I'm going to show
                            views after we explain the controller that feeds it its data. For SubArticle we go through
                            almost exactly the same process, so I'll omit that part. So here are the forms and article
                            display views.
                        </p>

                        <pre class="prettyprint">
/////////////////////////////////////////
//  demo/articleCreationForm.blade.php //
/////////////////////////////////////////
&#x40;&#x65;&#x78;&#x74;&#x65;&#x6E;&#x64;&#x73;&#x28;&#x27;&#x6D;&#x61;&#x73;&#x74;&#x65;&#x72;&#x27;&#x29;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x4E;&#x65;&#x77;&#x20;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x46;&#x6F;&#x72;&#x6D;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x72;&#x6F;&#x77;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x63;&#x6F;&#x6C;&#x20;&#x73;&#x31;&#x30;&#x20;&#x6F;&#x66;&#x66;&#x73;&#x65;&#x74;&#x2D;&#x73;&#x31;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x68;&#x33;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6C;&#x61;&#x72;&#x61;&#x76;&#x65;&#x6C;&#x2D;&#x72;&#x65;&#x64;&#x22;&#x3E;&#x4E;&#x65;&#x77;&#x20;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x46;&#x6F;&#x72;&#x6D;&#x3C;&#x2F;&#x68;&#x33;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x66;&#x6F;&#x72;&#x6D;&#x20;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x75;&#x72;&#x6C;&#x28;&#x27;&#x64;&#x65;&#x6D;&#x6F;&#x2F;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x27;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x20;&#x6D;&#x65;&#x74;&#x68;&#x6F;&#x64;&#x3D;&#x22;&#x50;&#x4F;&#x53;&#x54;&#x22;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x66;&#x6F;&#x72;&#x6D;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x68;&#x69;&#x64;&#x64;&#x65;&#x6E;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x5F;&#x74;&#x6F;&#x6B;&#x65;&#x6E;&#x22;&#x20;&#x76;&#x61;&#x6C;&#x75;&#x65;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x63;&#x73;&#x72;&#x66;&#x5F;&#x74;&#x6F;&#x6B;&#x65;&#x6E;&#x28;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x2D;&#x66;&#x69;&#x65;&#x6C;&#x64;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x74;&#x65;&#x78;&#x74;&#x22;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x76;&#x61;&#x6C;&#x69;&#x64;&#x61;&#x74;&#x65;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x20;&#x66;&#x6F;&#x72;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x3E;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x54;&#x69;&#x74;&#x6C;&#x65;&#x3C;&#x2F;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x2D;&#x66;&#x69;&#x65;&#x6C;&#x64;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x69;&#x7A;&#x65;&#x2D;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x20;&#x76;&#x61;&#x6C;&#x69;&#x64;&#x61;&#x74;&#x65;&#x22;&#x3E;&#x3C;&#x2F;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x20;&#x66;&#x6F;&#x72;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x3E;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x42;&#x6F;&#x64;&#x79;&#x3C;&#x2F;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x62;&#x75;&#x74;&#x74;&#x6F;&#x6E;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x62;&#x74;&#x6E;&#x20;&#x77;&#x61;&#x76;&#x65;&#x73;&#x2D;&#x65;&#x66;&#x66;&#x65;&#x63;&#x74;&#x20;&#x77;&#x61;&#x76;&#x65;&#x73;&#x2D;&#x6C;&#x69;&#x67;&#x68;&#x74;&#x22;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x73;&#x75;&#x62;&#x6D;&#x69;&#x74;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x22;&#x20;&#x6F;&#x6E;&#x63;&#x6C;&#x69;&#x63;&#x6B;&#x3D;&#x22;&#x24;&#x28;&#x27;&#x2E;&#x66;&#x6F;&#x72;&#x6D;&#x27;&#x29;&#x2E;&#x73;&#x75;&#x62;&#x6D;&#x69;&#x74;&#x28;&#x29;&#x3B;&#x22;&#x3E;&#x53;&#x75;&#x62;&#x6D;&#x69;&#x74;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x2D;&#x69;&#x63;&#x6F;&#x6E;&#x73;&#x20;&#x72;&#x69;&#x67;&#x68;&#x74;&#x22;&#x3E;&#x73;&#x75;&#x62;&#x6D;&#x69;&#x74;&#x3C;&#x2F;&#x69;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x62;&#x75;&#x74;&#x74;&#x6F;&#x6E;&#x3E;&#xA;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x66;&#x6F;&#x72;&#x6D;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x27;&#x29;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;</pre>

<pre class="prettyprint">
/////////////////////////////////
//  demo/articleEdit.blade.php //
/////////////////////////////////
&#x40;&#x65;&#x78;&#x74;&#x65;&#x6E;&#x64;&#x73;&#x28;&#x27;&#x6D;&#x61;&#x73;&#x74;&#x65;&#x72;&#x27;&#x29;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x45;&#x64;&#x69;&#x74;&#x20;&#x46;&#x6F;&#x72;&#x6D;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x72;&#x6F;&#x77;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x63;&#x6F;&#x6C;&#x20;&#x73;&#x31;&#x30;&#x20;&#x6F;&#x66;&#x66;&#x73;&#x65;&#x74;&#x2D;&#x73;&#x31;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x68;&#x33;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6C;&#x61;&#x72;&#x61;&#x76;&#x65;&#x6C;&#x2D;&#x72;&#x65;&#x64;&#x22;&#x3E;&#x45;&#x64;&#x69;&#x74;&#x20;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x46;&#x6F;&#x72;&#x6D;&#x3C;&#x2F;&#x68;&#x33;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x66;&#x6F;&#x72;&#x6D;&#x20;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x75;&#x72;&#x6C;&#x28;&#x27;&#x64;&#x65;&#x6D;&#x6F;&#x2F;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2F;&#x27;&#x2E;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x69;&#x64;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x20;&#x6D;&#x65;&#x74;&#x68;&#x6F;&#x64;&#x3D;&#x22;&#x50;&#x4F;&#x53;&#x54;&#x22;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x66;&#x6F;&#x72;&#x6D;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x5F;&#x6D;&#x65;&#x74;&#x68;&#x6F;&#x64;&#x22;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x68;&#x69;&#x64;&#x64;&#x65;&#x6E;&#x22;&#x20;&#x76;&#x61;&#x6C;&#x75;&#x65;&#x3D;&#x22;&#x50;&#x41;&#x54;&#x43;&#x48;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x68;&#x69;&#x64;&#x64;&#x65;&#x6E;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x5F;&#x74;&#x6F;&#x6B;&#x65;&#x6E;&#x22;&#x20;&#x76;&#x61;&#x6C;&#x75;&#x65;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x63;&#x73;&#x72;&#x66;&#x5F;&#x74;&#x6F;&#x6B;&#x65;&#x6E;&#x28;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x2D;&#x66;&#x69;&#x65;&#x6C;&#x64;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x74;&#x65;&#x78;&#x74;&#x22;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x76;&#x61;&#x6C;&#x69;&#x64;&#x61;&#x74;&#x65;&#x22;&#x20;&#x76;&#x61;&#x6C;&#x75;&#x65;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x20;&#x6F;&#x72;&#x20;&#x27;&#x27;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x20;&#x66;&#x6F;&#x72;&#x3D;&#x22;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x22;&#x3E;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x54;&#x69;&#x74;&#x6C;&#x65;&#x3C;&#x2F;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x69;&#x6E;&#x70;&#x75;&#x74;&#x2D;&#x66;&#x69;&#x65;&#x6C;&#x64;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x20;&#x69;&#x64;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x69;&#x7A;&#x65;&#x2D;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x20;&#x76;&#x61;&#x6C;&#x69;&#x64;&#x61;&#x74;&#x65;&#x22;&#x3E;&#x7B;&#x7B;&#x20;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x62;&#x6F;&#x64;&#x79;&#x20;&#x6F;&#x72;&#x20;&#x27;&#x27;&#x20;&#x7D;&#x7D;&#x3C;&#x2F;&#x74;&#x65;&#x78;&#x74;&#x61;&#x72;&#x65;&#x61;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x20;&#x66;&#x6F;&#x72;&#x3D;&#x22;&#x62;&#x6F;&#x64;&#x79;&#x22;&#x3E;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x42;&#x6F;&#x64;&#x79;&#x3C;&#x2F;&#x6C;&#x61;&#x62;&#x65;&#x6C;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x62;&#x75;&#x74;&#x74;&#x6F;&#x6E;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x62;&#x74;&#x6E;&#x20;&#x77;&#x61;&#x76;&#x65;&#x73;&#x2D;&#x65;&#x66;&#x66;&#x65;&#x63;&#x74;&#x20;&#x77;&#x61;&#x76;&#x65;&#x73;&#x2D;&#x6C;&#x69;&#x67;&#x68;&#x74;&#x22;&#x20;&#x74;&#x79;&#x70;&#x65;&#x3D;&#x22;&#x73;&#x75;&#x62;&#x6D;&#x69;&#x74;&#x22;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x3D;&#x22;&#x61;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x22;&#x20;&#x6F;&#x6E;&#x63;&#x6C;&#x69;&#x63;&#x6B;&#x3D;&#x22;&#x24;&#x28;&#x27;&#x2E;&#x66;&#x6F;&#x72;&#x6D;&#x27;&#x29;&#x2E;&#x73;&#x75;&#x62;&#x6D;&#x69;&#x74;&#x28;&#x29;&#x3B;&#x22;&#x3E;&#x53;&#x75;&#x62;&#x6D;&#x69;&#x74;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x69;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6D;&#x61;&#x74;&#x65;&#x72;&#x69;&#x61;&#x6C;&#x2D;&#x69;&#x63;&#x6F;&#x6E;&#x73;&#x20;&#x72;&#x69;&#x67;&#x68;&#x74;&#x22;&#x3E;&#x73;&#x61;&#x76;&#x65;&#x3C;&#x2F;&#x69;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x62;&#x75;&#x74;&#x74;&#x6F;&#x6E;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x66;&#x6F;&#x72;&#x6D;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x27;&#x29;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;</pre>

<pre class="prettyprint">
/////////////////////////////////
//  demo/showArticle.blade.php //
/////////////////////////////////
&#x40;&#x65;&#x78;&#x74;&#x65;&#x6E;&#x64;&#x73;&#x28;&#x27;&#x6D;&#x61;&#x73;&#x74;&#x65;&#x72;&#x27;&#x29;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x7B;&#x7B;&#x20;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x20;&#x7D;&#x7D;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x63;&#x6F;&#x6E;&#x74;&#x65;&#x6E;&#x74;&#x27;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x72;&#x6F;&#x77;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x64;&#x69;&#x76;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x63;&#x6F;&#x6C;&#x20;&#x73;&#x31;&#x30;&#x20;&#x6F;&#x66;&#x66;&#x73;&#x65;&#x74;&#x2D;&#x73;&#x31;&#x22;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x69;&#x66;&#x28;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x68;&#x34;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6C;&#x61;&#x72;&#x61;&#x76;&#x65;&#x6C;&#x2D;&#x72;&#x65;&#x64;&#x22;&#x3E;&#x7B;&#x7B;&#x20;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x74;&#x69;&#x74;&#x6C;&#x65;&#x20;&#x7D;&#x7D;&#x3C;&#x2F;&#x68;&#x34;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x70;&#x3E;&#x7B;&#x7B;&#x20;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x62;&#x6F;&#x64;&#x79;&#x20;&#x7D;&#x7D;&#x3C;&#x2F;&#x70;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x70;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x61;&#x20;&#x68;&#x72;&#x65;&#x66;&#x3D;&#x22;&#x7B;&#x7B;&#x20;&#x75;&#x72;&#x6C;&#x28;&#x27;&#x64;&#x65;&#x6D;&#x6F;&#x2F;&#x73;&#x75;&#x62;&#x41;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2F;&#x27;&#x2E;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x73;&#x75;&#x62;&#x5F;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x69;&#x64;&#x29;&#x20;&#x7D;&#x7D;&#x22;&#x3E;&#x3C;&#x2F;&#x61;&#x3E;&#x3C;&#x62;&#x72;&#x2F;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x41;&#x73;&#x73;&#x6F;&#x63;&#x69;&#x61;&#x74;&#x65;&#x64;&#x20;&#x55;&#x73;&#x65;&#x72;&#x73;&#x3A;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x66;&#x6F;&#x72;&#x65;&#x6C;&#x73;&#x65;&#x28;&#x24;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x2D;&#x3E;&#x75;&#x73;&#x65;&#x72;&#x73;&#x20;&#x61;&#x73;&#x20;&#x24;&#x75;&#x73;&#x65;&#x72;&#x29;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x7B;&#x7B;&#x20;&#x24;&#x75;&#x73;&#x65;&#x72;&#x2D;&#x3E;&#x6E;&#x61;&#x6D;&#x65;&#x20;&#x7D;&#x7D;&#x2C;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x65;&#x6C;&#x73;&#x65;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x4E;&#x6F;&#x6E;&#x65;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x65;&#x6E;&#x64;&#x66;&#x6F;&#x72;&#x65;&#x6C;&#x73;&#x65;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x70;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x65;&#x6C;&#x73;&#x65;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x68;&#x34;&#x20;&#x63;&#x6C;&#x61;&#x73;&#x73;&#x3D;&#x22;&#x6C;&#x61;&#x72;&#x61;&#x76;&#x65;&#x6C;&#x2D;&#x72;&#x65;&#x64;&#x22;&#x3E;&#x4E;&#x6F;&#x20;&#x61;&#x72;&#x74;&#x69;&#x63;&#x6C;&#x65;&#x20;&#x66;&#x6F;&#x75;&#x6E;&#x64;&#x21;&#x3C;&#x2F;&#x68;&#x34;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x70;&#x3E;&#x4C;&#x6F;&#x6F;&#x6B;&#x73;&#x20;&#x6C;&#x69;&#x6B;&#x65;&#x20;&#x74;&#x68;&#x61;&#x74;&#x20;&#x69;&#x64;&#x20;&#x70;&#x6F;&#x69;&#x6E;&#x74;&#x73;&#x20;&#x74;&#x6F;&#x20;&#x6E;&#x6F;&#x74;&#x68;&#x69;&#x6E;&#x67;&#x2E;&#x3C;&#x2F;&#x70;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x40;&#x65;&#x6E;&#x64;&#x69;&#x66;&#xA;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x20;&#x20;&#x20;&#x20;&#x3C;&#x2F;&#x64;&#x69;&#x76;&#x3E;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#xA;&#xA;&#x40;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;&#x28;&#x27;&#x66;&#x6F;&#x6F;&#x74;&#x27;&#x29;&#xA;&#x40;&#x65;&#x6E;&#x64;&#x73;&#x65;&#x63;&#x74;&#x69;&#x6F;&#x6E;</pre>

                        <p>
                            Ok, so there is a lot going on here, let me hit the main points. In the two forms we need
                            the hidden csrf token field to prevent any cross site request forgery. This is rolled into
                            Laravel by default and is easy enough to accommodate. Next up is the edit form needs to
                            emulate <b>PATCH</b>. Forms can't actually submit via PUT, PATCH or DELETE but the hidden
                            field with a name of "method" tells laravel how to interpret the request.<br/><br/>

                            Also in the edit form we're injecting the current article's fields. So you'll see a couple
                            curly braces in there. In the showArticle view we're just spitting out the article, it's
                            associate users and it's paired subArticle if it exists. Let's move on to the models.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="purpose" class="section scrollspy">
                    <h4 class="laravel-red">Models</h4>

                    <p>
                        We'll need a model for Articles, SubArticles and Users. We've already seen the model for
                        Articles, the one for Users is not modified from how it is delivered by Laravel so I won't
                        bother with it either. Let's take a look at the SubArticle model;
                    </p>

                    <pre class="prettyprint">
namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArticle extends Model
{
    protected $table = 'subArticles';
    protected $primaryKey = 'id';


    public function article(){
        return $this->hasOne('App\Article', 'id', 'subArticle_id');
    }
}</pre>
                    <p>
                        This is a very simple model. We're explicitly defining the table name, and primary key field. We
                        are also defining the inverse of the relationship that we put on Articles so we can go either
                        direction when necessary.
                    </p>

                </div>
            </div>
            <div class="row">
                <div id="purpose" class="section scrollspy">
                    <h4 class="laravel-red">Migrations/Seeding</h4>

                    <p>
                        We need a few tables, namely Users, Articles and SubArticles. Let's go through the steps to
                        setup migrations and seeds.<br/><br/>

                        First let's run <b>"php artisan migrate:install"</b>. This creates the migration table which
                        keeps track of which migrations to run when and the current database state. Now let's generate
                        our migration scaffolds with artisan commands as well. Run <b>"php artisan make:migration
                            CreateUsersTable"</b> and a similar one for each model. Now that we have all the files we
                        need for migrations, let's fill them in;
                    </p>

                    <pre class="prettyprint">
////////////////////////////////////////////////////
//  database/migrations/SOME_TIME_CODE_CRAP_Users //
////////////////////////////////////////////////////
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('article_id');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}</pre>

                    <pre class="prettyprint">
///////////////////////////////////////////////////////
//  database/migrations/SOME_TIME_CODE_CRAP_Articles //
///////////////////////////////////////////////////////
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

                    <pre class="prettyprint">
//////////////////////////////////////////////////////////
//  database/migrations/SOME_TIME_CODE_CRAP_SubArticles //
//////////////////////////////////////////////////////////
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubArticleTable extends Migration
{
    public function up()
    {
        Schema::create('subArticles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->integer('article_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('subArticles');
    }
}</pre>
                    <p>
                        Cool, we can instantly see the final structure of these tables. Both Article and SubArticle
                        contain a reference to one another. Users contains a reference to Article in the form of <b>article_id</b>.
                        Let's seed these tables so we have stuff to play with.<br/><br/>
                    </p>

                    <pre class="prettyprint">
//////////////////////
//  DatabaseSeeder  //
//////////////////////
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(BothResourcesTablesSeeder::class);
        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

                    </pre>

                    <pre class="prettyprint">
/////////////////////////////////
//  BothResourcesTablesSeeder  //
/////////////////////////////////
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

                    <pre class="prettyprint">
///////////////////////
//  UserTableSeeder  //
///////////////////////
use Illuminate\Database\Seeder;
use App\User;
use App\Article;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = array();

        foreach(range(1,20) as $index)
        {

            array_push($users,array(
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'article_id' => Article::orderByRaw("Rand()")->first()->id,
                'password' => Hash::make($faker->password),
                'created_at' => $faker->dateTimeThisYear
            ));
        }

        User::insert($users);

    }
}

                    </pre>

                    <p>
                        Ooohhh, Seeeedy. Ok, so first we've got the <b>DatabaseSeeder.php</b> which marshalls all of our
                        seeders. We see that it calls the <b>BothResourcesTablesSeeder</b> first followed by the <b>UsersTableSeeder</b>.
                        In <b>BothResourcesTableSeeder</b> we're looping 100 times to create 100 articles, subArticles
                        all while linking them together. In <b>UsersTableSeeder</b> we're creating 20 users and randomly
                        associating them with an article. Let's pretend this is their favorite all-time article. Note
                        that we needed to have the articles already seeded so we could pick a favorite article for each
                        user. Order often matters when seeding. Sometimes this gets a bit cumbersome, but remember you
                        can modify tables in subsequent seeds once the rows are initially written if you want to.
                    </p>

                </div>
            </div>
            <div class="row">
                <div id="purpose" class="section scrollspy">
                    <h4 class="laravel-red">More Views</h4>

                    <p>

                    </p>

                </div>
            </div>
        </div>
        <div class="col hide-on-small-only m2">
            {{--@include('demo.sidenav')--}}
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