<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
    //
    protected $fillable = ['user_id','title','description'];
   
   //Eloquent: Mutators
    protected $created_at = ['created_at'];
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
   
    //Eloquent: Mutators
    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::parse('Y-m-d H:i:s',$date);
    }
   //Eloquent: Mutators
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    }
    
}
