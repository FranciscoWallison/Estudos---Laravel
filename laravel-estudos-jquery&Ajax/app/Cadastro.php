<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    //
    protected $fillable = ['nome','email'];

    public static $rules = [
    'nome'=> 'required|min:3|max:150', 
    'email'=>'required|email|max:150|unique:cadastros',
    ];
}
