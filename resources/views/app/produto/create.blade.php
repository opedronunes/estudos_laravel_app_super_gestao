@extends('app.layouts.basico')

@section('titulo', 'Produto - Adicionar')
    
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="" method="post">
                    @csrf
                    <input type="text" name="nome" value="" placeholder="Nome" id="" class="borda-preta">
                    
                    <input type="text" name="descricao" value="" placeholder="descricao" id="" class="borda-preta">
                    
                    <input type="text" name="peso" value="" placeholder="peso" id="" class="borda-preta">

                    <select name="unidade_id" id="">
                        <option>-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{$unidade->id}}">{{ $unidade->descricao }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection