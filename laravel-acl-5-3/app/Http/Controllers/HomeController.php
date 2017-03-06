<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //autentificação e autorização
        $posts = Post::all(); // {{-- @can('update-post',$post) --}}

        //$posts = Post::where('user_id',auth()->user()->id)->get();

        return view('home', compact('posts'));
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);

        //Valideition autorized
        if( Gate::denies('edit_post',$post) )
            abort(403,'Não Autorizado');

        return view('update-post', compact('post'));
    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;

        var_dump("<h1>{ $nameUser }</h1>");

        foreach (auth()->user()->roles as $role) {
            echo "<b>{$role->name}</b>". " -> ";

            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                echo " {$permission->name}  ";
            }
             echo "<hr> ";
        }
    }
}
