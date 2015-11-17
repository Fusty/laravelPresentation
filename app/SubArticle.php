<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArticle extends Model
{
    protected $table = 'subArticles';
    protected $primaryKey = 'id';

    public static $rules = [
        'title' => 'required|unique:articles|max:255',
        'body' => 'required',
    ];


    public function article(){
        return $this->hasOne('App\Article', 'id', 'article_id');
    }
}
