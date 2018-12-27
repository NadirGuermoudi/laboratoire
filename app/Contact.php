<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    protected $fillable = ['nom', 'prenom', 'partenaire_id', 'fonction', 'pays', 'ville', 'adresse', 'email', 'telephone', 'created_at','updated_at'];

    public function partenaire(){
    	return $this->belongsTo('App\Partenaire');
    }
}
