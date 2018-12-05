@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar Produto</div>

                    <div class="card-body">
                        <form action="/produto" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input class="form-control" type="text" name="descricao" id="descricao" maxlength="500">
                            </div>

                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input class="form-control" type="number" name="preco" id="preco" max="1000">
                            </div>

                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="" selected disabled> <-- Selecione um Tipo --> </option>
                                    @foreach($tiposProduto as $tipo)
                                        <option value="{{$tipo->nome}}">{{$tipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Salvar</button>

                            <a href="/produto" class="btn btn-primary" role="button">Voltar</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection