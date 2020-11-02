<?php

namespace App\Http\Controllers;

use App\CursoModel;
use Illuminate\Http\Request;
use stdClass;

use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCursos = CursoModel::orderBy('id')->get();

        return view('curso.list')->with('cursos', $objCursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objCurso = new CursoModel();
        $objCurso->nome = $request->nome;
        $objCurso->abreviatura = $request->abreviatura;
        $objCurso->save();


        return redirect()->action('CursoController@index')
            ->with('success', 'Curso Salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function show(CursoModel $cursoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCurso = CursoModel::findOrFail($id);
        return view('curso.edit')->with('curso', $objCurso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $objCurso = CursoModel::findOrFail($request->id);
      $objCurso->nome = $request->nome;
      $objCurso->abreviatura = $request->abreviatura;
      $objCurso->save();

      return redirect()->action('CursoController@index')
          ->with('success', 'Curso Salvo com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CursoModel  $cursoModel
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $objCurso = CursoModel::findOrFail($id);
        $objCurso->delete();

        return redirect()->action('CursoController@index')
            ->with('success', 'Curso Removido com sucesso.');

    }
    public function search(Request $request)
    {
        //opção 01
        /*
        if (!empty($request->nome)) {
            $objCurso = CursoModel::where('nome', 'like', '%' . $request->nome . '%')->get();
        } else if (!empty($request->curso)) {
            $objCurso = CursoModel::where('curso', 'like', '%' . $request->curso . '%')->get();
        } else {
            $objCurso = CursoModel::orderBy('id')->get();
        }
        */
        //opção 02
        $query = DB::table('curso');

        if (!empty($request->nome)) {
            $query->where('nome', 'like',  '%' . $request->nome . '%');
        }

        if (!empty($request->curso)) {
            $query->where('curso', 'like', '%' . $request->curso . '%');
        }

        $objCurso = $query->orderBy('id')->get();

        return view('curso.list')->with('cursos', $objCurso);
    }
}
