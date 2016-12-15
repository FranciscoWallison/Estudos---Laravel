<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>{{$titulo or 'Curo de laravel'}}</title>
  
  @stack('scripts')
    <!--jquery-->
    <script src="{{url('js/jquery-3.1.0.min.js')}}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    
</head>
<body>
  
  <div class="container">
    @yield('content')
  </div>
      

  @stack('scripts-footer')

  <!-- Modal delete -->
  <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> Deletar cidades</h4>
        </div>
        <div class="modal-body">

        <div class="errors-msg-delete alert alert-danger" style="display: none;"></div>
        <div class="success-msg-delete alert alert-success" style="display: none;"></div>
        
          <p class="msg-delete">Deletar informação</p>
          
          <input type="hidden" id="urlDeletar" value="" > 
          <input type="hidden" id="token" value="{{csrf_token()}}" > 
                      
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger btn-confirme-delete">Deletar</button>
        
          <div class="preloader-delete" style="display: none;">Enviando dados...</div>
          
        </div>
      </div>
    </div>
  </div>


  <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<script>
    $(function() {
      jQuery( "#form" ).submit( function(){
        var dadosForm = jQuery(this).serialize();
        jQuery.ajax({
          url: jQuery(this).attr('attr-send'),
          data: dadosForm,
          method: 'POST',
          // Preloader de Dados
          beforeSend: preloader()

        }).done( function( data ){
          if( data == "1" ){

            jQuery(".errors-msg").hide();

            jQuery(".success-msg").html('Sucesso!');
            jQuery(".success-msg").show();

            //depois de 3 segundos ira atualiza a pagina
            setTimeout("location.reload();",1000);
          }else{

            jQuery(".errors-msg").html(data);
            jQuery(".errors-msg").show();

          }
          
        }).fail(function(){
          alert('falha oa enviar dados');
        //}).complete(function(){
          endPreloader()//finaliza - quando completar a minha requisição ira chama o metodo 
        });

        function preloader()
        {
          //inicia
          jQuery(".preloader").show();
        }

        function endPreloader()
        {
          //finalizar
          jQuery(".preloader").hide();        

        }

        return false;
      });
      //aqui estou retirando o bug do editar  e cadastrar
      jQuery(".btn-cadastrar").click(function(){
        jQuery('#form')[0].reset();//reseta campo
        jQuery("#form").attr("attr-send",urlAdd);//uptade
        jQuery("#form").attr("action",urlAdd);//uptade

      })

    });

    function edit(urlEditd){
      jQuery.getJSON(urlEditd, function(data){

        jQuery.each(data, function(key, val){
          jQuery("*[name='"+key+"']").val(val);
           //jQuery("input[name='"+key+"']").val(val);//limitdo ao campo input
        })
       
      });
      
      jQuery('#myModal').modal('show');
      return false;
    }

    function deletetar(urlDeletar){
      jQuery("#urlDeletar").val(urlDeletar);
      jQuery("#myModalDelete").modal();

    }
   
    jQuery(".btn-confirme-delete").click(function(){
      //pega url deletar
      var urlDelete = jQuery("#urlDeletar").val();

      //pega o campo csrf_field
      //var csrf = jQuery(".token").val();
      //alert(csrf);

      jQuery.ajax({
          url: urlDelete,
          //data: {_token: '{!! csrf_token() !!}' },
          method: 'GET',
          // Preloader de Dados
          beforeSend: preloaderDelete()
      }).done( function( data ){
         if( data == "1" ){

            jQuery(".errors-msg").hide();

            jQuery(".success-msg-delete").html('Deletado !');
            jQuery(".success-msg-delete").show();

            //depois de 3 segundos ira atualiza a pagina
            setTimeout("location.reload();",1000);
          }else{

            jQuery(".errors-msg-delete").html(data);
            jQuery(".errors-msg-delete").show();

          }
      }).fail(function(){
          alert('falha oa enviar dados');
      //}).complete(function(){
          endPreloaderDelete()//finaliza - quando completar a minha requisição ira chama o metodo 
      });
      function preloaderDelete()
      {
        //inicia
        jQuery(".preloader-delete").show();
      }

      function endPreloaderDelete()
      {
        //finalizar
        jQuery(".preloader-delete").hide();        

      }

    });
    /*
    ex1:
    jQuery.ajax({
          url: "{!! route('expRout1.store')   !!}",
          data: {_token: '{!! csrf_token() !!}' },
          method: 'post',
          // Preloader de Dados
      })
      ex2:
      jQuery.ajax({
          url: "{!! route('expRout1.store')   !!}",
          data: {_token: '{!! csrf_token() !!}',nameUser: $(this).val() },
          method: 'post',
          // Preloader de Dados
      })
      */
</script>

</body>
</html>
