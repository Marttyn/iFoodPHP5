@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cadastrar Pedido</div>

                    <div class="card-body">
                        <form action="/pedido" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="estabelecimento">Estabelecimento</label>
                                <select class="form-control" name="estabelecimento" id="estabelecimento">
                                    <option value="" selected disabled> <-- Selecione um Estabelecimento --></option>
                                    @foreach($estabelecimentos as $estabelecimento)
                                        <option value="{{$estabelecimento->id}}">{{$estabelecimento->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="pedidoDiv">

                                <table class="table table-responsive-sm table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%">Produto</th>
                                        <th style="width: 20%">Preço</th>
                                        <th style="width: 10%">Quantidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($produtos as $tipo => $produto)
                                        @foreach($produto as $prod)
                                            <tr>
                                                <td>Combo: {{$prod->descricao}} + Refrigerante</td>
                                                <td>R$ {{number_format($prod->preco+($prod->preco*0.1), 2, ',', '.')}}</td>
                                                <td><input class="form-control" type="number" name="combo[{{$prod->id}}]" id="combo1"
                                                           value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>{{$prod->descricao}}</td>
                                                <td>R$ {{number_format($prod->preco, 2, ',', '.')}}</td>
                                                <td><input class="form-control" type="number"
                                                           name="prod[{{$prod->id}}]" id="prod1"
                                                           value="0"></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                            <button class="btn btn-primary" type="submit">Salvar</button>

                            <a href="/pedido" class="btn btn-primary" role="button">Voltar</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection