<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cadastro;
use App\Estado;
use App\Cidade;
use Validator;

class JqueryController extends Controller
{
    //
    private $cadastro , $request , $estado, $cidades, $validator;
    public function __construct(Cadastro $cadastro,Request $request, Estado $estado, Cidade $cidades, Validator $validator){

        $this->$cadastro    = $cadastro;
        $this->request      = $request;
        $this->estado       = $estado;
        $this->cidades      = $cidades;
        $this->validator    = $validator; 
    }

    public function jquery()
    {
        $estados = $this->estado->get();
    	return view('jquery.index',compact('estados'));
    }

    public function cidades($idEstado)
    {
        $estado     = $this->estado->find($idEstado);
        $cidades    = $estado->cidades;

       return view('jquery.cidades.cidade',compact('estado','cidades'));
    }

    public function cadastrarCidade()
    {
        $dadosForm = $this->request->all();

         $validator = validator($dadosForm,Cidade::$rules);;//valida os daos passado pelo form

        //messages erros
        if( $validator->fails() ){//verifica se encontrou algum erro
            $messages  = $validator->messages();

            $displayErros = '';

            foreach ($messages->all("<p>:message</p>") as $message) {
               $displayErros .= $message;
            }

            return $displayErros;
        }

        $insert = Cidade::create($dadosForm);

        if( $insert )
            return '1';
        else
            return 'falha ao cadastrar ';
        
    }

    public function editGo($idCidade)
    {
        $dadosForm = $this->request->all();

         $validator = validator($dadosForm,Cidade::$rules);;//valida os daos passado pelo form

        //messages erros
        if( $validator->fails() ){//verifica se encontrou algum erro
            $messages  = $validator->messages();

            $displayErros = '';

            foreach ($messages->all("<p>:message</p>") as $message) {
               $displayErros .= $message;
            }

            return $displayErros;
        }
        $cidade = Cidade::find($idCidade);
        $update =  $cidade->update($dadosForm);

        if( $update )
            return '1';
        else
            return 'falha ao cadastrar ';
        
    }   

    public function edit($idCidade){
       $cidade =  Cidade::find($idCidade);
       return response()->json($cidade);
    }

    public function delete($idCidade){
        $cidade = Cidade::find($idCidade);
        if($cidade->delete()){
            return '1';
        }else{
            return 'Fala ao enviar';
        }
    }
    
    public function formulario()
    {
        $titulo = 'Cadastrar dados via Ajax';
    	

    	return view('jquery.cadastro',compact('titulo'));
    }


	public function cadastrar()
	{


    	$dadosForm = $this->request->all();
        $validator = validator($dadosForm,Cadastro::$rules);

        //messages erros
        if( $validator->fails() ){
            $messages  = $validator->messages();

            $displayErros ='';

            foreach ($messages->all("<p>:message</p>") as $message) {
               $displayErros .= $message;

            }
            return $displayErros;
        }


        $insert = Cadastro::create($dadosForm);

        //messages sucesso
        if($insert)
            return '1';
        else
            return 'falha ao cadastrar ';
    	
    }
}
