
@extends('principal')

@section('conteudo')

<div>
    <ul class='alert alert-danger'>
    @foreach($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
    </ul>
</div>

<form action="/produtos/adiciona" method='post'>

<input type="hidden" name='_token' value="{{ csrf_token() }}">

<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control"name="nome">
</div>
<div class="form-group">
    <label>Valor</label>
    <input type="number" class="form-control"name="valor">
</div>
<div class="form-group">
    <label>Quantidade</label>
    <input type="number" class="form-control"name="quantidade">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" class="form-control"name="descricao">
</div>
<div class="form-group">
    <label>tamanho</label>
    <input type="text" class="form-control"name="tamanho">
</div>

<div class="form-group">
    <label>categoria</label>
    <select name="categoria" class="form-control" id="categoria">
        @foreach($categorias as $c)
        <option value="{{$c->id}}">{{$c->nome}}</option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary" type="submit">CRIAR</button>

</form>

@stop