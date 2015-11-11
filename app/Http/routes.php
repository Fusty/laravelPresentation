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
