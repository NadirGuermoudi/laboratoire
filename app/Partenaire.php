<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

class Partenaire extends Model
{
    protected $fillable = ['name', 'type', 'pays', 'ville', 'adresse', 'email','telephone', 'created_at','updated_at'];

    public function contacts(){
    	return $this->hasMany('App\Contact');
    }
}
