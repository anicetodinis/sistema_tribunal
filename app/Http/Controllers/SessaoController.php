<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Juiz;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todos os dados da sessao
        $search = request('search');  
        
        if($search){
        $sessao = Sessao::where([
            ['name', 'like', '%'.$search.'%']
        ])->get();
        }else{
            $sessao = Sessao::all();
        }


        //return dd($sessao);

        return view('seccao.index', ['sessao' => $sessao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('seccao.create');// Retorna a criacao da seccao
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Puxa dados que vem do formulario
    {
        $sessao = new Sessao();//Atribuir seccao ao objecto

        $request->validate([ //validacao
            'name' => 'required|max:100|min:5',
        ]);
        $sessao->fill($request->all());
        $sessao->save();


        return redirect('/sessao')->with ('create','Sessao criada com sucesso!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //dados de uma sessao
        $sessao = Sessao::findOrFail($id);

        $juiz = Juiz::where("sessao_id", $id)->get();

        //return dd($juiz);

        //return dd($sessao);

        return view('seccao.show', ['sessao' => $sessao, 'juiz' => $juiz]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dados de uma sessao
        $sessao = Sessao::findOrFail($id);

        //return dd($sessao);

        return view('seccao.edit', ['sessao' => $sessao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sessao  $sessao
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
        return redirect('/sessao')->with ('update','Sessao actualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sessao = Sessao::findOrFail($id)->delete();
        return redirect('/sessao')->with ('delete','Sessao deletada com sucesso!'); 
    }

    public function document()
    {
        $sessao = Sessao::all();;
        $pdf = Pdf::loadView('relatorios.sessao', compact('sessao'));
        return $pdf->setPaper('a4')->stream('Relatorio de Todas as Seccoes.pdf');
    }

}
