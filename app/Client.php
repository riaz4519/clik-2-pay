<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable =
        [
            'first_name',
            'last_name',
            'phone',
            'email',
            'address1',
            'city',
            'post_code',
            'company'
        ];

    public function invoices(){

        return $this->hasMany('App\Invoice');

    }

}
