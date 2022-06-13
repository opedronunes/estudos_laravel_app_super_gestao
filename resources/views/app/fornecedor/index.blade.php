<h3>Fornecedor</h3>

{{-- Fica aqui o comentário que será descartado pelo interpretador do blade --}}

@php

    // comentário de uma linha

    /*
    Comentário de várias linhas
    */

    //echo 'Texto de teste';

@endphp

@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}    
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não existem fornecedores cadastrados
    
    @endforelse
        
@endisset


{{--
Estrutura de repetição FOREACH
@isset($fornecedores)

    @foreach($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}    
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    
    @endforeach
        
@endisset

Estrutura de repetição WHILE
@isset($fornecedores)

    @php $i = 0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}    
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
        @php $i++ @endphp
    @endwhile
@endisset

Estrutura de repetição FOR
@isset($fornecedores)

    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}    
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
    @endfor

@endisset

Estrutura de repetição SWITCH
@switch($fornecedores[0]['ddd'])
    @case ('11')
        São Paulo - SP
        @break
    @case ('32')
        Juiz de Fora - MG
        @break
    @case ('85')
        Fortaleza - CE
        @break
    @default
        Estado não identificado

@endswitch
--}}
    


