<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableGeneration extends Model
{
    //
    protected $table = 'generation';

    protected $fillable = [
        'generation_key',
        'company_id',
        'completed',
    ];


    public function company(){
        return $this->belongsTo('App\Company');
    }



}
