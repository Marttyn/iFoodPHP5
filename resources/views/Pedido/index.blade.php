@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="/home" class="btn btn-sm btn-primary" role="button">Home</a>
                    <a href="pedido/create" class="btn btn-sm btn-primary" role="button">Registrar Pedido</a>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">Pedidos</div>

                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover" style="text-align: center;">
                            <thead style="background-color: gray; color: white;">
                            <tr>
                                <td>Data</td>
                                <td>Código</td>
                                <td>Andamento</td>
                                <td>Conteúdo</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                <tr style="cursor: pointer;" onclick="location.href = '/pedido/{{$pedido->id}}'">
                                    <td><button class="btn btn-sm float-left">&#128065;</button> {{$pedido->data->format('d/m/Y H:i:s')}}</td>
                                    <td>{{$pedido->codigo}}</td>
                                    <td>{{$pedido->estado->nome}}</td>
                                    <td>
                                        @foreach($pedido->getVenda() as $tipo)
                                            @foreach($tipo as $prod)
                                                <span class="form-text">{{$prod->getDescricao()}}</span>
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection