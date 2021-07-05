<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogador = new Jogador();
        $jogadores = Jogador::All();
        return view ("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores
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
    public function store(Request $request)
    {
        $validado = $request->validate([
            "nome_jogador" => "required",
            "data_nascimento" => "date_format:m/d/Y|after:tomorrow",
            "clube_jogador" => "required",
            "posicao_jogador" => "required"
  
            
        ]);

        if($request->get("id") != ""){
            $jogador = Jogador::Find($request->get("id"));
        }else{
            $jogador = new Jogador();
        }
        $jogador->nome_jogador = $request->get("nome_jogador");
        $jogador->data_nascimento = $request->get("data_nascimento");
        $jogador->clube_jogador = $request->get("clube_jogador");
        $jogador->posicao_jogador = $request->get("posicao_jogador");
       
        if($request->get("check_figurinha")==1){
            $jogador->check_figurinha = 1;
        }else{
            $jogador->check_figurinha = 0;
        }
        $jogador->save();
        $request->Session()->flash("status", "salvo");
        return redirect("/jogador");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = Jogador::Find($id);
        $jogadores = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogador
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
        Jogador::Destroy($id);
        $request->session()->flash("status", "excluido"); /* 4.1 (default.blade) */
        return redirect("/jogador");
    }
}
