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
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade_id</th>

                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>

                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->fornecedor->site}}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>

                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>

                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $produto->id }}" action="{{ route('produto.destroy', $produto->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', $pedido->id) }}">
                                            Pedido: {{ $pedido->id }}, 
                                        </a>
                                    @endforeach
                                </td>
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