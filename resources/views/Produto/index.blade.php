@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="/home" class="btn btn-sm btn-primary" role="button">Home</a>
                    <a href="produto/create" class="btn btn-sm btn-primary" role="button">Cadastrar Produto</a>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">Produtos</div>

                    <div class="card-body">
                        <ul>
                        @foreach($produtos as $tipo => $prods)
                            <li>{{$tipo}}
                                <ul>
                                    @foreach($prods as $prod)
                                        <li>R$ {{$prod->preco}} - {{$prod->descricao}}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection