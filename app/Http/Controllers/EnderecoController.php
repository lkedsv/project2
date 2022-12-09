<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\endereco;

class EnderecoController extends Controller
{
    public static function enderecoInsert (Request $request, $cliente_id){

        $new_endereco = [
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'complemento' => $request->complemento,
            'cliente_id'=> $cliente_id,
        ];

        //Eloquent
        $endereco = new endereco($new_endereco);
        $endereco->save();
        //dd($cliente);
        //dd = "Dump and Die"        
    }

    public static function enderecoUpdate (Request $request, $cliente_id){

        $endereco = endereco::find($cliente_id);
    
            $endereco->cep = $request->cep;
            $endereco->rua = $request->rua;
            $endereco->bairro = $request->bairro;
            $endereco->cidade = $request->cidade;
            $endereco->uf = $request->uf;
            $endereco->complemento = $request->complemento;

        //Eloquent
        $endereco->save();       
    }
}
