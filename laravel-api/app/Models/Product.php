<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     * Campos que podem ser prenchidos
     * @var array
     */
    protected $fillable= ['name','description'];
}
