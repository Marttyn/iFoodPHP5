@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="/home" class="btn btn-sm btn-primary" role="button">Home</a>
                    <a href="reclamacao/create" class="btn btn-sm btn-primary" role="button">Registrar Reclamação</a>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">Reclamações</div>

                    <div class="card-body">
                        <ul>
                        @foreach($reclamacoes as $reclamacao)
                            <li>{{$reclamacao->descricao}}<br> Atribuido para: {{$reclamacao->Atribuido()[0]->nome}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection