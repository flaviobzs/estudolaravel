@extends('principal')

@section('conteudo')

<form action="/acesso" method='post'>

<input type="hidden" name='_token' value="{{ csrf_token() }}">

<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control"name="email">
</div>
<div class="form-group">
    <label>Senha</label>
    <input type="password" class="form-control"name="password">
</div>

<button class="btn btn-primary" type="submit">LOGIN</button>

</form>

@stop