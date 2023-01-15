@extends('app.layouts.basico')

@section('titulo', 'Pedido')
    
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <div class="informacao-pagina">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID do pedido</th>
                            <th>Cliente</th>
                            <th>Pedido</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', $pedido->id) }}">Adionar produtos</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('pedido.edit', $pedido->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" action="{{ route('pedido.destroy', $pedido->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}

                <!-- 
                    
                    {{ $pedidos->count() }} - Total de reistros por página
                    {{ $pedidos->total() }} - Total de reistros da consulta
                    {{ $pedidos->firstItem() }} - Número do primeiro registro da página
                    {{ $pedidos->lastItem() }} - Número do último registro da página

                -->

                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>
@endsection