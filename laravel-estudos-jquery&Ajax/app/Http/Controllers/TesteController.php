<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TesteController extends Controller
{
    //
    public function index(){
    	return view('view');
    }
    public function create(){
    	return "Creação";
    }
    public function edit($id = 'null'){
    	return "Editar o {$id}";
    }
    public function delete($id = 'null',$name = 'lore'){
    	return "Deletar o ID: {$id} com o nome: {$name} ";
    }
    public function matriculas(){
        return view('painel.matricula.index');
    }
    public function financeiro(){
        return view('painel.financeiro.index');
    }
}
}
