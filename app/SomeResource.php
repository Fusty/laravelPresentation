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
        return $this->hasOne('App\SomeOtherResource', 'someResource_id', 'id');
    }

    public function users(){
        return $this->hasMany('App\User', 'someResource_id', 'id');
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
