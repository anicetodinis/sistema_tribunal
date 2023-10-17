<?php

namespace App\Http\Controllers;

use App\Models\Juiz;
use App\Models\Processo;
use Illuminate\Http\Request;

class JuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $search = request('search');  
        
        if($search){
        $juiz = Juiz::where([
            ['name', 'like', '%'.$search.'%']
        ])->get();
        }else{
            $juiz = Juiz::all();
        }

        return view ('juizes.index', ['juiz'=> $juiz]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('juizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juiz = new Juiz();

        $request->validate([
                    'name' => 'required|max:100|min:5',
                    'sessao_id' => 'required'
        ]);

       

        $juiz->fill($request->all());

        $juiz->save();

        return redirect('/juiz')->with ('create','Juiz criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juiz  $juiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $juiz = Juiz::findOrFail($id);

        $processo = Processo::where("juiz_id", $id)->get();

        return view ('juizes.show', ['juiz'=> $juiz, 'processo'=> $processo]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juiz  $juiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juiz = Juiz::findOrFail($id);
        return view ('juizes.edit', ['juiz'=> $juiz]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juiz  $juiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:5',
            'sessao_id' => 'required'
        ]);

        $juiz = Juiz::findOrFail($id);

        $juiz->update([
                    'actualizado_por' => $request->actualizado_por,
                    'name' => $request->name,
                    'sessao_id' => $request->sessao_id,

        ]);

        return redirect('/juiz')->with ('update','Juiz actualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juiz  $juiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Juiz::findOrFail($id)->delete();

        return redirect('/juiz')->with ('delete','Juiz deletado com sucesso!');

    }
}
