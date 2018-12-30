<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function encadreurExterieur(){
		return $this->belongsTo('App\Contact', 'encadreur_ext');
	}

	public function coEncadreurExterieur(){
		return $this->belongsTo('App\Contact', 'coencadreur_ext');
	}
}
