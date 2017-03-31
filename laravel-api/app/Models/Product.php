<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //campos que podem ser prenchidos
    protected $fillable= ['name','description'];
}
