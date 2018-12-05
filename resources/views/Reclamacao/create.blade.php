@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Registrar Reclamação</div>

                    <div class="card-body">
                        @if($errors->any())
                            <small style="color: red;">{{$errors->first()}}</small>
                        @endif
                        <form action="/reclamacao" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="assunto">Assunto</label>
                                <select class="form-control" name="assunto" id="assunto">
                                    <option value="" selected disabled><-- Selecione um Assunto --></option>
                                    <option value="3">Demora na Entrega</option>
                                    <option value="2">Comida Estragada</option>
                                    <option value="1">Mal atendimento do Gerente</option>
                                    <option value="4">Bug no Software</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Salvar</button>

                            <a href="/reclamacao" class="btn btn-primary" role="button">Voltar</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection