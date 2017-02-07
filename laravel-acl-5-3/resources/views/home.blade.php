@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                        @forelse($posts as $post)

                            @can('view_post',$post)
        
                                <h1>{{ $post->title }}</h1>

                                <p>{{ $post->description }}</p>
                                
                                <b> Autor : {{ $post->user->name }}</b>

                                {{-- @can('update-post',$post) --}}
                                    <a href="{{action('HomeController@update', $post->id)}}">Editar</a>
                                {{-- @endcan --}} 

                                <hr>
                            @endcan

                        @empty

                            <p> Sem cadastro </p>

                        @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
