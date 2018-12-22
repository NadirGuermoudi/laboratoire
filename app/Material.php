<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['category', 'numero', 'prix', 'empruntable', 'created_at','updated_at'];

    public function users(){
        return $this->belongsToMany('App\User', 'user_material');
    }

    public function equipes(){
        return $this->belongsToMany('App\Equipe', 'equipe_material');
    }

    public function isDisponible(){
        $equipe = DB::select('SELECT achronymes, date_rendre 
        	FROM equipe_material h, equipes e 
        	WHERE material_id = ' . $this->id . ' AND date_rendement IS NULL AND equipe_id = e.id');

        $user = DB::select('SELECT name, prenom, date_rendre 
        	FROM user_material h, users u 
        	WHERE material_id = ' . $this->id . ' AND date_rendement IS NULL AND user_id = u.id');
        
        if(count($equipe) != 0){
        	return [
        		'disponible' => false, 
	        	'emprunter_par' => $equipe[0]->achronymes, 
	        	'disponibleLe' => date("d/m/Y",strtotime($equipe[0]->date_rendre))
    		];
    	}

    	if(count($user) != 0){
    		return [
	        		'disponible' => false, 
		        	'emprunter_par' => $user[0]->name . ' ' . $user[0]->prenom, 
		        	'disponibleLe' => date("d/m/Y",strtotime($user[0]->date_rendre))
    		];
    	}
        
    	return [
        		'disponible' => true, 
	        	'emprunter_par' => '',
	        	'disponibleLe' => ''
		];
    }
}
