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
    protected $fillable = ['name','description'];

    /**
     * Validate
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|mid:3|max:100|unique:products',
            'description'   => 'required|mid:3|max:1000'
        ];
    }

}
