<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SomeResource extends Model
{
    protected $table = 'someResources';
    protected $primaryKey = 'id';

    //Let's store userCount as a property so we don't rerun the query if we've already grabbed this
    private $userCount;

    public function someOtherResource(){
        return $this->hasOne('App\SomeOtherResource');
        //or
        return $this->hasOne('App\SomeOtherResource', 'id');
        //or
        return $this->hasOne('App\SomeOtherResource', 'id', 'someOtherResource_id');
    }

    public function users(){
        return $this->hasMany('App\User');
        //or
        return $this->hasMany('App\User', 'id');
        //or
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function userCount(){
        if ($this->userCount != null) {
            return $this->userCount;
        } else {
            $this->userCount = $this->users()->count();
            return $this->publishCount;
        }
    }
}
