@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulário Curso') }}

                <div class="card-body">
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{action(' AlunoController@update')}}" method="post">
        @csrf
        <div class="form-row">


        <input type="hidden" name="id" value="{{$aluno->id}}"/>
        <div class="col">


        <label for="nome">Nome</label> </br>
        <input type="text" name="nome" value="{{$aluno->nome}}"/> </br>
        </div>
        <div class="col">


        <label for="curso">Curso</label> </br>
        <input type="text" name="curso" value="{{$aluno->curso}}"/> </br>
        </div>
        <div class="col">


        <label for="turma">Turma</label> </br>
        <input type="text" name="turma" value="{{$aluno->turma}}"/> </br>
        </div>
        <div class="col-12">


        <button class="btn btn-primary" type="submit">Atualizar</button>
        <a class="btn btn-primary" href="{{url('aluno')}}">Voltar</a>
          </div>
        </div>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
    @endsection
