@extends('templates.templates')
@section('content')

<h1>Cadastrar via Ajax</h1>

<div class="errors-msg alert alert-danger" style="display: none;"></div>

<div class="success-msg alert alert-success" style="display: none;"></div>

<form method="POST" action="/cadastro-jquery" id="form" class="form">
	{{csrf_field()}}
	<div class="form-group">
		<input type="nome" name="nome" placeholder="Nome" class="form-control">
	</div>
	<div class="form-group">
	<input type="email" name="email"  placeholder="E-mail" class="form-control">
	</div>

	<div class="loading" style="display: none;">Enviando dados</div>
	<input type="submit" id="btn" name="enviar" value="Enviar Dados" class="btn btn-success" data-loading-text = "Loading..." autocomplete="off">
</form>
<script>
	$(function() {
		jQuery( "#form" ).submit( function(){
			var dadosForm = jQuery(this).serialize();


			jQuery.ajax({
				url: 'cadastro-jquery',
				data: dadosForm,
				method: 'POST',
				// Preloader de Dados
				beforeSend: preloader()

			}).done(function(data){
				
				if( data == "1" ){
					jQuery(".errors-msg").hide();
					jQuery(".success-msg").html('Cadastrado');
					jQuery(".success-msg").show();

					//depois de 3 segundos ira atualiza a pagina
					setTimeout(function() {
						location.reload();
						endPreloader();//finaliza - quando completar a minha requisição ira chama o metodo 
					},3000);

				}else{

					jQuery(".errors-msg").html(data);
					jQuery(".errors-msg").show();

				}
				
			}).fail(function(){
				alert('falha oa enviar os dados');
			//}).complete(function(){
				endPreloader();//finaliza - quando completar a minha requisição ira chama o metodo 
			});

			function preloader()
			{
				//inicia
				$('#btn').button('loading');
			}
			function endPreloader()
			{
				//finalizar
				$('#btn').button('reset');
			}

			return false;
		});
	});
</script>

@endsection
