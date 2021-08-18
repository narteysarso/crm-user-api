<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $fillable = [
        'name',
        'description'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
