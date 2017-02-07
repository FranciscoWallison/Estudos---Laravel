@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar - {{ $post->title }}</div>

                <div class="panel-body">
                        
        
                            <h1>{{ $post->title }}</h1>

                            <p>{{ $post->description }}</p>
                            
                            <b> Autor : {{ $post->user->name }}</b>

                            <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
