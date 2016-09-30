<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    // Relationship  one to  Many
    public function cidades(){
    	return $this->hasMany('App\Cidade','id_estado');
    }
}
