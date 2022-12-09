<?php

namespace App\Http\Controllers; //Local onde o ClienteController.php, está

use App\Providers\ViaCEP;
use Illuminate\Http\Request;    

use App\Models\cliente;        //Camimho até o arquivo Cliente.php
use App\Http\Controllers\EnderecoController;
use App\Models\endereco;

class ClienteController extends Controller
{
    public function clienteForm (Request $request){
        return view('clienteform');
    }

    public function clienteEdit (Request $request){
        $cliente =  new cliente();
        //$cliente = cliente::where('id', $request->id)->get();
        $cliente = $cliente->find($request->id);
        //dd($cliente);
        $endereco =  new endereco();
        $endereco = $endereco->find($cliente->id);
        return view('clienteedit', ['cliente' => $cliente, 'endereco'=>$endereco]);
    }

    
    public function clienteInsert (Request $request){

        $request->validate([
            'nome'         =>   'required',
            'cpf'          =>   'required|unique:clientes',
            'cep'          =>   'required'
        ]);

        $new_cliente = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'categoria' => $request->categoria,
            'telefone' => $request->telefone,
            'user_id'=> $request->user_id,
        ];

        //Eloquent
        $cliente = new Cliente($new_cliente);
        $cliente->save();

        //Vincula e insere o endereço do novo cliente
        EnderecoController::enderecoInsert($request, $cliente->id);

        //dd($cliente);
        //dd = "Dump and Die"
        $Cliente = cliente::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->get();

        $mensagem='Cliente cadastrado com sucesso'; 

        return view('dashboard', ['cliente'=>$Cliente, 'mensagem'=>$mensagem]);
        
    }
    


    /*public function read(Request $r){
        $cliente =  new cliente();
        $cliente = $cliente->find($r->id);
        return view('atualizaclientes',  ['Cliente'=>$cliente]);
        return $cliente;
        dd($cliente);
    }
    */

    /*public function all(Request $r){
        $clientes = cliente::all();
        return $clientes;
    }*/

    /*
    public function update(Request $r){
        $cliente = Cliente::find($r->id);
        //$cliente = Cliente::where('id','>',0)->update(['cep'=>'96640000']);
        $cliente->nome = 'alterado';
        $cliente->save();
        return $cliente;
    }*/

    public function clienteUpdate(Request $request, $id){
        $cliente = cliente::find($id);
    
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->categoria = $request->categoria;
            $cliente->telefone = $request->telefone;

        //Eloquent
        $cliente->save();

        //Vincula e altera o endereço do cliente
        EnderecoController::enderecoUpdate($request, $cliente->id);

        $Cliente = cliente::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->get();

        $mensagem='Cliente alterado com sucesso'; 

        return view('dashboard', ['cliente'=>$Cliente, 'mensagem'=>$mensagem]);

        //return $cliente;
        //dd($cliente);
    }

    public function clienteDelete(Request $request, $id){
        $cliente = cliente::find($id);
        if ($cliente){
            
            $cliente->delete();

            $mensagem='Cliente removido com sucesso'; 

        }else{
            $mensagem='Cliente não encontrado...';
        }

        $ClienteList = cliente::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->get();

        $mensagem='Cliente removido com sucesso'; 

        return view('dashboard', ['cliente'=>$ClienteList, 'mensagem'=>$mensagem]);
    }

    function painel(Request $request){

        $Cliente = cliente::where('user_id', $request->id)->orderBy('created_at', 'desc')->get();

        $mensagem = '';

        return view('dashboard', ['cliente'=>$Cliente, 'mensagem'=>$mensagem]);
    }
}
