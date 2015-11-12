<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SomeOtherResource extends Model
{
    protected $table = 'someOtherResources';
    protected $primaryKey = 'id';


    public function someResource(){
        return $this->hasOne('App\SomeResource', 'id', 'someOtherResource_id');
    }
}
