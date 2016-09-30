@extends('templates.templates')
@section('content')
<table class="table table-content">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Ações</th>
	</tr>

	@forelse($estados as $estado)
	<tr>
		<th>{{$estado->id}}</th>
		<th>{{$estado->name}}</th>
		<th>
			<a  href="{{action('JqueryController@cidades', $estado->id)}}" >cidades</a>
		</th>
	</tr>

	@empty
	<p> Não existem estados cadastrados</p>
	@endforelse
</table>

@endsection