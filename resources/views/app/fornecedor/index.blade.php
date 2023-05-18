<h3>Teste</h3>

@php

    /*

    */

@endphp

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? 'Dado não informado' }}
        <br>
        Telefone: {{$fornecedor['ddd'] ?? ''}} {{$fornecedor['numero'] ?? ''}}
        <hr>
    @empty
        Não existem fornecedores cadastrados.
    @endforelse
@endisset