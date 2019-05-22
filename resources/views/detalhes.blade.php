@extends('principal')

@section('conteudo')

<h1>Detalhes do produto {{$produto->nome}}</h1>

<ul>
    <li>
        Valor: R$ {{$produto->valor}}
    </li>
    <li>
        Descrição: R$ {{$produto->descricao}}
    </li>
    <li>
        Quantidade: R$ {{$produto->quantidade}}
    </li>
</ul>