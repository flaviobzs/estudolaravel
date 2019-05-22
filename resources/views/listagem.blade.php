@extends('principal')


@section('conteudo')

<h1>Listagem de produtos</h1>

<table class="table">
    @foreach($produtos as $p)
    <tr class="{{ $p->quantidade <= 1 ? 'table-danger' : ''}}">
        <td>{{$p->nome}}</td>
        <td>{{$p->valor}}</td>
        <td>{{$p->descricao}}</td>
        <td>{{$p->quantidade}}</td>
        <td>{{$p->tamanho}}</td>
        <td>{{$p->categoria->nome}}</td>
        <td>
           <a href="/produtos/mostra/{{$p->id}}">
           Detalhes
           </a> 
        </td>
        <td>
           <a href="/produtos/remove/{{$p->id}}">
           Apagar
           </a> 
        </td>
    </tr>
    @endforeach
</table>


<!-- 
withInput - indicar que o parametro indicado foi da requisição anterior (valor adicionado no formulario)    
-->
@if(old('nome'))
    <div class="alert alert-success" role="alert">
        Produto {{old('nome')}} adicionado com sucesso!
    </div>
@endif

<!--
isset verifica se a variavel existe    
@if(isset($nome)) 
    Produto {{$nome}} adicionado com sucesso!
@endif
-->

@stop