<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //

    protected $fillable = ['user_id','client_id','amount','url_short','status_id','invoice_for'];


    public function status(){


        return $this->belongsTo('App\Status');



    }

    public function client(){

        return $this->belongsTo('App\Client');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }
    
}
