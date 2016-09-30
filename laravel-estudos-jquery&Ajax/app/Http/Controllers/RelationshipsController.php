<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\PostViews;

class RelationshipsController extends Controller
{
    //
    public function oneToOne(){

    	$post = Post::create([
    		'title' => 'Titulo do post',
    		'description' => 'Descrição compreta do post',
    		'date' => date('Y-m-d'),
    		'time' => date('Hms'),
    	]);

    	$postViews = PostViews::create([
    		'qtd' => 0,
    		'id_post' => $post->id,
    	]);	

    	return 'oneToOne';
    }
}
