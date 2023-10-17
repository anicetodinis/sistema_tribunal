<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Juiz;
use App\Models\Sessao;
use App\Models\Processo;
use Carbon\Carbon;


class HomeController extends Controller
{
    //
    public function home()
    {
       //Time Now
       $dt = Carbon::now();

       //Date of Today, converted to String
       $date = $dt->toDateString();
       $month = $dt->subMonth()->toDateString();
       $year = $dt->subYear()->toDateString();
        //Para saber se o registro e deste Ano
        $sessao_Year = Sessao::whereDate('created_at' ,'>=', $year)->get();
       //Para saber se o registro e deste mes
       $sessao_Month = Sessao::whereMonth('created_at' ,'>=', $month)->get();

       //Para saber se o registro e de Hoje
       $processo_Month = Processo::whereMonth('created_at' ,'=', 8)->get();
       $juiz_Today = Juiz::where('created_at', $date)->get();
       $processo_Today = Processo::whereDate('created_at' ,'>=', $date)->get();

       $sessao = Sessao::all()->count();
       $processo = Processo::all()->count();
       $juiz = Juiz::all()->count();

       return view('welcome', ['sessao' => $sessao, 
                    'processo' => $processo, 
                    'juiz' => $juiz, 
                    'processo_Month' => $processo_Month->count(),
                    'processo_Today' => $processo_Today->count(),
        ]);


    }

}
