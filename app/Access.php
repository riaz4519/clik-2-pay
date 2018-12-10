<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    //

    protected $fillable =
        [

            'access',
            'description',
            'permission_id'
        ];

    public function roles(){

        return $this->belongsToMany('App\Role');

    }

}
