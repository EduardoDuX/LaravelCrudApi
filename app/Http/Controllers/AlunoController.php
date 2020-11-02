<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use App\AlunoModel;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function index()
    {
        $objAluno = AlunoModel::orderBy("id")->get();
        return view('aluno.list')->with('alunos', $objAluno);



    }

    public function create()
    {
        return view("aluno.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'curso' => 'required',
        ]);

        $objAluno = new AlunoModel();
        $objAluno->nome = $request->nome;
        $objAluno->curso = $request->curso;
        $objAluno->turma = $request->turma;

        $objAluno->save();

        return redirect()->action('AlunoController@index')
            ->with('success', 'Aluno Salvo com sucesso.');
    }

    public function edit($id)
    {
        $objAluno = AlunoModel::findorfail($id);

        return view('aluno.edit')->with('aluno', $objAluno);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'curso' => 'required',
        ]);

        $objAluno = AlunoModel::findorfail($request->id);
        $objAluno->nome = $request->nome;
        $objAluno->curso = $request->curso;
        $objAluno->turma = $request->turma;

        $objAluno->save();

        return redirect()->action('AlunoController@index')
            ->with('success', 'Aluno Editado com sucesso.');
    }
    public function remove($id)
    {
        //select * from alunos where id = $id
        $objAluno = AlunoModel::findOrFail($id);

        $objAluno->delete();

        return redirect()->action('AlunoController@index')
            ->with('success', 'Aluno Remover com sucesso.');
    }
    public function search(Request $request)
    {
        //opção 01
        /*
        if (!empty($request->nome)) {
            $objAluno = AlunoModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->curso)) {
            $objAluno = AlunoModel::where('curso', 'like', '%' . $request->curso . '%')->get();
        } else {
            $objAluno = AlunoModel::orderBy('id')->get();
        }
        */
        //opção 02
        $query = DB::table('alunos');

        if (!empty($request->nome)) {
            $query->where('nome', 'like',  '%' . $request->nome . '%');
        }

        if (!empty($request->curso)) {
            $query->where('curso', 'like', '%' . $request->curso . '%');
        }

        $objAluno = $query->orderBy('id')->get();

        return view('aluno.list')->with('alunos', $objAluno);
    }
}
