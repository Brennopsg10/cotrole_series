<!-- Extender o layout ao qual será inserido o contexto abaixo -->
@extends('layout')

<!-- Seções preechidas no layout-->
@section('cabecalho')
Adicionar Série
@endsection()

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    <!-- @csrf Envio de Token exigido para form no Laravel -->
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2">
            <label for="nome">N° de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>

        <div class="col col-2">
            <label for="nome">Ep. por temporada</label>
            <input type="number" class="form-control" name="qtd_episodios" id="qtd_episodios">
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection()