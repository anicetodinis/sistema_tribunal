<?php

namespace App\Http\Controllers\API;

use App\Models\Sessao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessao = Sessao::all();

        if($sessao->count() <= 0):
            return response()->json([
                'message' => "Não foi encontrada nenhuma secção registada no sistema"
            ], 200);
        else:
            return response()->json([
                'message' => "Todas as Secções",
                'numero de Secções' => $sessao->count(),
                'seccoes' => $sessao
            ], 200);
        endif;       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sessao = new Sessao();//Atribuir seccao ao objecto

        $request->validate([ //validacao
            'name' => 'required|max:100|min:5',
        ]);
        $sessao->fill($request->all());
        $sessao->save();

        return response()->json([
            'message' => "Secção gravada com sucesso",
            'sessao' => $sessao
        ], 201);
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
        //$sessao = Sessao::findOrFail($id);
        $sessao = Sessao::where("id", $id)->first();

        if(!$sessao):
            return response()->json([
                'message' => "Não foi encontrada nenhuma secção com este ID",
                "todas_sessoes" => "http://localhost:8000/api/sessao"
            ]);
        else:
            return response()->json([
                "message" => "Detalhes da ".$sessao->name,
                "sessao" => $sessao,
                "todas_sessoes" => "http://localhost:8000/api/sessao"
            ]);
        endif;
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
        $request->validate([
            'name' => 'required|max:100|min:5',
        ]);
        $sessao = Sessao::findOrFail($id);
        $sessao->update([
            'actualizado_por' => $request->actualizado_por,
            'name' => $request->name
        ]);
        return response()->json([
            "message" => "Dados Actualizados com Sucesso!",
            "sessao" => $sessao,
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sessao::findOrFail($id)->delete();
        return response()->json([
            "message" => "Dados removidos com Sucesso!",
        ], 200);
    }
}
