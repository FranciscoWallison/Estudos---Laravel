@extends('templates.templates')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg btn-cadastrar" data-toggle="modal" data-target="#myModal">
  Cadastrar Cidades
</button>


<h1>{{$estado->name}}</h1>

<table class="table table-content">
	<tr>
		<th>Id</th>
		<th>Cidades</th>
		<th>Ações</th>
	</tr>

	@forelse($cidades as $cidade)
	<tr>
		<th>{{$cidade->id}}</th>
		<th>{{$cidade->name}}</th>
    <th>
      <a href="#" onclick='edit("/editar-cidade/{{$cidade->id}}")'>Editar</a>|
      <a href="#" onclick='deletetar("/deletar-cidade/{{$cidade->id}}")'>Deletar</a>
     
    </th>
	</tr>

	@empty
	<p> Não existem Cidades cadastrados no Etado {{$estado->name}}</p>
	@endforelse
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gestao de cidades</h4>
      </div>
      <div class="modal-body">


        <div class="errors-msg alert alert-danger" style="display: none;"></div>
        <div class="success-msg alert alert-success" style="display: none;"></div>

      	<form class="form" method="POST" action="/cadastrar-cidade" id="form" attr-send="/cadastrar-cidade">
          {{csrf_field()}}
      			
      		<input type="hidden" name="id_estado" value="{{$estado->id}}">

      		<div class="form-group">
      			<input type="text" name="name" placeholder="Incira o Nome" class="form-control">
      		</div>
            	      
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form> 

        <div class="preloader" style="display: none;">Enviando dados...</div>
        
      </div>
    </div>
  </div>
</div>


<script>
  // bug do editar e cadastrar
  var urlAdd = '/cadastrar-cidade'
</script>
@endsection