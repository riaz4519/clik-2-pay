<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable =
        [
            'name'
        ];

    public function accesses(){

        return $this->belongsToMany('App\Access');

    }

    public function users(){

        return $this->hasMany('App\User');
    }



}
