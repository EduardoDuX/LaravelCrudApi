@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem de Alunos') }}</div>

                <div class="card-body">


    <form action="{{ action('AlunoController@search')}}" method="POST">
        @csrf
        <div class="form-row">

      <div class="col-6">
        <input type="text" class="form-control" placeholder="Pesquisar Nome" name="nome"/>
      </div>
      <div class="col-6">
        <input type="text" class="form-control" placeholder="Pesquisar Curso" name="curso"/>
      </div>
      <div class="col-6">
        <br>
        <button class="btn btn-primary" type="submit">Buscar</button>
        <a href="{{url('/aluno/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Cadastrar</a>
      </div>

        </div>
    </form>
<br>
    <table class="table table-hover">
      <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Curso</th>
                <th scope="col">Turma</th>
                <th scope="col">Ação</th>
                <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach($alunos as $dados)
            <tr>
                <td>{{$dados->id}}</td>
                <td>{{$dados->nome}}</td>
                <td>{{$dados->curso}}</td>
                <td>{{$dados->turma}}</td>
                <td> <a href="{{action('AlunoController@edit',$dados->id)}}"><i class="fa fa-edit"></i>Editar</a></td>
                <td> <a href="{{action('AlunoController@remove',$dados->id)}}" onclick="return confirm('Tem certeza que deseja remover?');"><i class="fa fa-trash"></i>Remover</a></td>
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
