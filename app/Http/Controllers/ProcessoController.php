<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\Http\Request;
use App\Models\Juiz;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $search = request('search');  
        
        if($search){
            $processo = Processo::where([
                ['numero_processo', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $processo = Processo::all();
        }
        
        return view ('processos.index', ['processo'=> $processo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('processos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $processo = new Processo();

        $juiz = Juiz::all();
        $juiz_selected = $juiz->random();

        $request->validate([
                    'numero_processo' => 'required',
                    'especie' => 'required',
                    'data' => 'required',
                    'criado_por' => 'required',
                    'actualizado_por' => 'required'
        ]);

        $processo->fill([
            'numero_processo' => $request->numero_processo,
            'juiz_id' => $juiz_selected->id,
            'especie' => $request->especie,
            'data' => $request->data,
            'criado_por' => $request->criado_por,
            'actualizado_por' => $request->actualizado_por,
            ]);

        $processo->save();

        return redirect('/processo')->with ('create','Processo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $processo = Processo::findOrFail($id);
        return view ('processos.show', ['processo'=> $processo]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $processo = Processo::findOrFail($id);
        return view ('processos.edit', ['processo'=> $processo]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero_processo' => 'required',
            'juiz_id' => 'required',
            'especie' => 'required',
            'data' => 'required',
            'criado_por' => 'required',
            'actualizado_por' => 'required'
        ]);

        $processo = Processo::findOrFail($id);

        $processo->update([
                    'juiz_id' => $request->juiz_id,
                    'especie' => $request->especie,
                    'data' => $request->data,
                    'actualizado_por' => $request->actualizado_por,
        ]);

        return redirect('/processo')->with ('update','Processo actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Processo::findOrFail($id)->delete();

        return redirect('/processo')->with ('delete','Processo deletado com sucesso!');
    }

    public function addfile($id)
    {
        $processo = Processo::findOrFail($id);
        return view ('processos.addfile', ['processo'=> $processo]); 
    }
}
