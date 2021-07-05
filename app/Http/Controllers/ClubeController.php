<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();
        return view ("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
            "nome_clube" => "required",
            "imagem_clube" => "required|mimes:jpg,bmp,png,webp"
        ]);


        if($request->get("id") != ""){
            $clube = Clube::Find($request->get("id"));
        }else{
            $clube = new Clube();
        }
        $clube = new Clube();
        $nome_clube = $request->get("nome_clube");
       
        $clube->nome_clube = $nome_clube;
        if($request->hasFile("imagem_clube")){
        $clube->imagem_clube = $request->file("iamgem_clube")->store("clubes");
        }else{
            $clube->imagem_clube = null;
        }
      

        $clube->save();
        $request->Session()->flash("status", "salvo");
        return redirect("/clube");
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
        $clube = Clube::Find($id);
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
        Clube::Destroy($id);
        $request->session()->flash("status", "excluido"); /* 4.1 (default.blade) */
        return redirect("/clube");
    }
}
