<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

    public static $rules = [
        'title' => 'required|unique:articles|max:255',
        'body' => 'required',
    ];

    //Let's store userCount as a property so we don't rerun the query if we've already grabbed this
    private $userCount;

    public function subArticle(){
        return $this->hasOne('App\SubArticle', 'article_id', 'id');
    }

    public function users(){
        return $this->hasMany('App\User', 'article_id', 'id');
    }

    public function userCount(){
        if ($this->userCount != null) {
            return $this->userCount;
        } else {
            $this->userCount = $this->users()->count();
            return $this->userCount;
        }
    }
}
