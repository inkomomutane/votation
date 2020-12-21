<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name','votes','email'];
    
    public function users(){
        return $this->hasMany('App\User');
    }
}