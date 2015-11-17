<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class DemoController extends Controller
{
    public function index()
    {
        $articles = App\Article::with('subArticle', 'users')->paginate(10);

        return view('demo.browser', ['articles' => $articles]);
    }

}
