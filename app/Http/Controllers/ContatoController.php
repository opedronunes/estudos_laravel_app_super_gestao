<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        /*
        $contato = new SiteContato();
        $contato->create($request->all());
        */
        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */
        /*
        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();
        */
        /*
        echo '<pre>';
        print_r($contato->getAttributes());
        echo '</pre>';

        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        
        dd($request);
        */
        return view('site.contato');
    }

    public function salvar(Request $request){

        //Validação de dados antes da inserção de dados.
        $request->validate([
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'required',
                'motivo_contato' => 'required|max:2000'
                
        ]);

        //SiteContato::create($request->all());

    }
}
