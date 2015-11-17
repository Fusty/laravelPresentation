<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('components', ['as' => 'components', function () {
    return view('components');
}]);

Route::group([], function () {
    Route::get('foundation', ['as' => 'foundation', function () {
        return view('foundation');
    }]);
    Route::get('demo', ['as' => 'demo', function () {
        return view('demo');
    }]);
});

Route::get('map', ['as' => 'map', function () {
    return view('map');
}]);

Route::group(['middleware' => 'someMiddleware'], function () {
    Route::get('user/{id}/profile', ['as' => 'userProfile', function ($id) {
        $data = array('user' => User::find($id));

        $data['userIsAdmin'] = User::isAdmin();

        return view('user.profile', $data);
    }]);

    Route::get('user/{id}/profile/json', ['as' => 'userProfile', function ($id) {
        return response()->json(User::find($id));
    }]);
});

//Route::get('user/{id}/profile', ['as' => 'userProfile', 'uses' => "UserController"]);

Route::get('/articleRelationTest', function () {
    //Get a Article to play with, let's grab the first one it finds
    $theArticle = App\Article::first();

    //Get it's paired SubArticle if it exists
    //We'll get this with the relation method we just defined in the model
    $theSubArticle = $theArticle->subArticle();

    //Let's get all the users associated with this resource, if any
    $theArticlesUsers = $theArticle->users();


    //Let's do this without the extra steps, I want the other resource and users nested in one Article object
    $theArticle = App\Article::with('subArticle', 'users')->take(20)->get();

    return response()->json($theArticle);
});

Route::get('/articleUserCount', function () {
    //Let's list the user counts for each resource.
    $output = '';

    foreach (App\Article::all() as $article) {
        $output .= "Article #" . $article->id . " has " . $article->userCount() . " users associated with it.<br/><br/>";
    }

    return $output;
});

Route::get('/newArticlePostForm', function(){
    return view('foundation.newArticlePostForm', ["input", Request::only(['title', 'body'])]);
});

Route::post('/newArticle', function () {
    $validator = Validator::make(Request::only(['title', 'body']), App\Article::$rules);

    if ($validator->fails()) {
        return "Nope, that didn't go so well";
    }

    return "Successfully wrote that new article! (actually I skipped the creation step so I can re-use this form indefinitely, just pretend I did)";
});

Route::resource('demo/article', 'ArticleController');

Route::resource('demo/subArticle', 'SubArticleController');

Route::get('demo/browser', 'DemoController@index');

Route::get('demo/associateSubArticle/{articleId}/{subArticleId}', 'DemoController@associateSubArticle');

Route::get('demo/associateUsers/{articleId}/{userId}', 'DemoController@associateUsers');