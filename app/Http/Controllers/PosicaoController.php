<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicao;

class PosicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicao = new Posicao();
        $posicoes = Posicao::All();
        return view ("posicao.index", [
            "posicao" => $posicao,
            "posicoes" => $posicoes
        ]);
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

    /* Função de salvar */
    public function store(Request $request)
    {
        $validado = $request->validate([
            "descricao" => "required",
        ]);

        if($request->get("id") != ""){
            $posicao = Posicao::Find($request->get("id"));
        }else{
            $posicao = new Posicao();
        }
        $posicao->goleiro = $request->get("goleiro");
        $posicao->defensor = $request->get("defensor");
        $posicao->lateral = $request->get("lateral");
        $posicao->volante = $request->get("volante");
        $posicao->meia = $request->get("meia");
        $posicao->atacante = $request->get("atacante");
        $posicao->descricao = $request->get("descricao");
        $posicao->save();
        $request->Session()->flash("status", "salvo"); /* 3.1 (default.blade) */
        return redirect("/posicao");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* Função de editar */
    public function edit($id)
    {
        $posicao = Posicao::Find($id);
        $posicoes = Posicao::All();
        return view("posicao.index", [
            "posicao" => $posicao,
            "posicoes" => $posicoes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Posicao::Destroy($id);
        $request->session()->flash("status", "excluido"); /* 4.1 (default.blade) */
        return redirect("/posicao");
    }
}
