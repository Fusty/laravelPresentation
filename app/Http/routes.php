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

Route::get('/',['as' => 'home', function () {
    return view('home');
}]);

Route::get('components',['as' => 'components', function () {
    return view('components');
}]);

Route::group([], function(){
    Route::get('foundation',['as' => 'foundation', function () {
        return view('foundation');
    }]);
});

Route::get('map',['as' => 'map', function () {
    return view('map');
}]);

Route::group(['middleware' => 'someMiddleware'], function(){
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

Route::get('/someResourceRelationTest', function(){
    //Get a SomeResource to play with, let's grab the first one it finds
    $theResource = App\SomeResource::first();

    //Get it's paired SomeOtherResource if it exists
    //We'll get this with the relation method we just defined in the model
    $theOtherResource = $theResource->someOtherResource();

    //Let's get all the users associated with this resource, if any
    $theResourcesUsers = $theResource->users();


    //Let's do this without the extra steps, I want the other resource and users nested in one SomeResource object
    $theResource = App\SomeResource::with('someOtherResource', 'users')->take(20)->get();

    return response()->json($theResource);
});

Route::get('/someResourceUserCount', function(){
    //Let's list the user counts for each resource.
    $output = '';

    foreach(App\SomeResource::all() as $resource){
        $output .= "Resource #".$resource->id." has " . $resource->userCount() . " users associated with it.<br/><br/>";
    }

    return $output;
});