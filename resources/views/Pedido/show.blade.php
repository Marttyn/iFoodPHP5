@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="/pedido" class="btn btn-sm btn-primary" role="button">Voltar</a>
                </div>
                <br><br>

                @include('layouts.error')

                <div class="card">
                    <div class="card-header">Pedido {{$pedido->codigo}}</div>

                    <div class="card-body">

                        <ul>
                            <li>
                                <label for="codigo">Codigo: </label>
                                <span id="codigo">{{$pedido->codigo}}</span>
                            </li>
                            <li>
                                <label for="data">Data do Pedido: </label>
                                <span id="data">{{$pedido->data->format('d/m/Y')}}</span>
                            </li>
                            <li>
                                <label for="estabelecimento">Estabelecimento: </label>
                                <span>{{$pedido->getEstabelecimento->nome}}</span>
                            </li>
                            <li>
                                <label for="usuario">Usuário: </label>
                                <span>{{$pedido->getUsuario->name}}</span>
                            </li>
                            <li>
                                <label for="andamento">Andamento: </label>
                                <span>{{$pedido->getEstadoNome()}}</span>
                            </li>
                        </ul>

                        <hr>
                        <legend>Novo Andamento</legend>

                        <form action="/pedido/{{$pedido->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="andamento">Andamento: </label>
                                <select class="form-control" name="andamento" id="andamento">
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Salvar">
                        </form>

                        <hr>
                        <legend>Gerenciar Andamentos</legend>

                        <form action="/pedido/{{$pedido->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <input type="hidden" name="rollback" value="1">
                            <div class="form-group">
                                <label for="andamento">Andamento: </label>
                                <select class="form-control" name="andamento" id="andamento">
                                    @foreach($pedido->Andamentos as $andamento)
                                        @if($andamento->ativo)
                                            <option selected disabled>{{$andamento->Estado->nome}} - Ativo</option>
                                        @else
                                            <option value="{{$andamento->id}}">{{$andamento->Estado->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Salvar">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection