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
    public function rules($id='')
    {
        return [
            'name'          => "required|min:3|max:100|unique:products,name,{$id},id",
            'description'   => 'required|min:3|max:1000'
        ];
    }

    public function rulesSearch()
    {
        return[
            'Key-search' => 'required',
        ];
    }

    public function search($data,$totalPage)
    {
        return $this->where('name',$data['Key-search'])
            ->orWhere('description','LIKE',"%{$data['Key-search']}%")
            ->paginate($totalPage);
    }

}
