<?php

namespace App\Http\Controllers;

use App\TurmaModel;
use App\CursoModel;
use Illuminate\Http\Request;
use Illluminate\Support\Facades\Http;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/turma');

        $objTurma = json_decode(json_encode($response->json()));

        return view('turma.list')->with('turmas', $objTurma);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function show(TurmaModel $turmaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TurmaModel $turmaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TurmaModel $turmaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TurmaModel  $turmaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurmaModel $turmaModel)
    {
        //
    }
}
