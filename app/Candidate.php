<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name','votes','funcao'];
    
    public function users(){
        return $this->hasMany('App\User');
    }
    
}