<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class SubArticleController extends Controller
{
    //Comments ommitted for brevity
    public function index()
    {
        //We won't need this route, but it would normally be a list of all Articles
    }

    public function create()
    {
        //The form for creating a new article.
        return view('demo.subArticleCreationForm');
    }

    public function store(Request $request)
    {
        //Do validation
        $validator = Validator::make(Request::only(['title', 'body']), App\SubArticle::$rules);
        if ($validator->fails()) {
            return "Something was wrong with your title or body, please try again";
        }

        //Write to database
        $article = new App\SubArticle();
        $article->title = Request::title;
        $article->body = Request::body;
        $article->save();

        //Push user to new article page
        return Redirect::to('demo/subArticle/'.$article->id);
    }

    public function show($id)
    {
        //This is what the browser page will link to for individual articles
        $article = App\SubArticle::with('article')->findOrFail($id);

        return view('demo.showSubArticle', ['article' => $article]);
    }

    public function edit($id)
    {
        //The form for editing a new article.
        return view('demo.subArticleEditForm');
    }

    public function update(Request $request, $id)
    {
        //Updates an existing article from the above form

        //Do validation
        $validator = Validator::make(Request::only(['title', 'body']), App\SubArticle::$rules);
        if ($validator->fails()) {
            return "Something was wrong with your title or body, please try again";
        }

        //Update this record
        $article = App\SubArticle::findorFail($id);
        $article->title = Request::title;
        $article->body = Request::body;
        $article->save();

        //Push user to the article page
        return Redirect::to('demo/subArticle/'.$id);
    }

    public function destroy($id)
    {
        //Deletes an existing article
        App\SubArticle::where('id', $id)->delete();
    }
}
