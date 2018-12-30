<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
	/* ibrahim:  I added the next line of code, it allows the insertion in the columns
		indicated 
	*/

    protected $fillable = ['titre', 'image', 'resume', 'contenu'];
}
