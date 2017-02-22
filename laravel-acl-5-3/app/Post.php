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
        $this->attributes['date_meeting'] =  Carbon::parse('Y-m-d',$date);
    }
   //Eloquent: Mutators
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
    
}
