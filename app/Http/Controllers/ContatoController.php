<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

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
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){

        //Validação de dados antes da inserção de dados.
        $regras = 
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
                
            ];
            $feedbacks = 
            //Cutomização de mensagem de feedback e validação
            [
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres!',
                'nome.max' => 'O campo nome recebe no máximo 40 caracteres!',
                'email.email' => 'O e-mail informado não é válido!',
                'mensagem.max' => 'A mensagem suporta no máximo 2.000 caracteres!',
                
                'required' => 'O campo :attribute precisa ser preenchido!'
            ];
        $request->validate($regras, $feedbacks);

        SiteContato::create($request->all());
        return redirect()-> route('site.index');

    }
}
