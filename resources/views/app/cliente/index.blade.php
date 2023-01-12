@extends('app.layouts.basico')

@section('titulo', 'Cliente')
    
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <div class="informacao-pagina">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}

                <!-- 
                    
                    {{ $clientes->count() }} - Total de reistros por página
                    {{ $clientes->total() }} - Total de reistros da consulta
                    {{ $clientes->firstItem() }} - Número do primeiro registro da página
                    {{ $clientes->lastItem() }} - Número do último registro da página

                -->

                Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>
@endsection