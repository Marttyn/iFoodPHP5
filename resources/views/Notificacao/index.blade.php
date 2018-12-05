@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="/home" class="btn btn-sm btn-primary" role="button">Home</a>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">Notificações</div>

                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover">
                            <thead style="background-color: gray; color: white;">
                            <tr>
                                <td>Descrição</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notificacoes as $notificacao)
                                <tr>
                                    <td>{{$notificacao->descricao}}</td>
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