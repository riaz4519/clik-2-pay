<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $fillable =
        [

            'name'

        ];

    public function accesses(){


        return $this->hasMany('App\Access');


    }
}
