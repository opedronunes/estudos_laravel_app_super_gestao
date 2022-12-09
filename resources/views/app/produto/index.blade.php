@extends('app.layouts.basico')

@section('titulo', 'Produtos')
    
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <div class="informacao-pagina">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade_id</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                                <td><a href="{{ route('produto.destroy', $produto->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}

                <!-- 
                    
                    {{ $produtos->count() }} - Total de reistros por página
                    {{ $produtos->total() }} - Total de reistros da consulta
                    {{ $produtos->firstItem() }} - Número do primeiro registro da página
                    {{ $produtos->lastItem() }} - Número do último registro da página

                -->

                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection