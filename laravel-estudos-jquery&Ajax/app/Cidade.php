<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    protected $fillable = ['id_estado','name'];
    public static $rules = [
    'id_estado' => 'required',//obrigatorio
    'name' 		=> 'required|min:3|max:150',
    ]; 

    
}
