@extends('layouts.main')
@section('title','Edit Processo')
@section('content')


<div class="container">

    <div class="card mt-5 py-5 shadow-lg">
        <form>
            
            <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nr.º Processo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$processo->numero_processo}}" name="numero_processo" placeholder="Nr. de Processo" readonly>
                </div>
                <div class="col-6">
                    <label for="Inputespecie" class="form-label">Especie</label>
                    <input type="date" class="form-control" name="data" id="Inputespecie" value="{{$processo->data}}" readonly>
                </div>
            </div>

            <div class="row mx-2">
                <div class="col-6"> 
                <label for="Inputespecie" class="form-label">Especie</label>
                    <input type="text" class="form-control" name="especie" id="Inputespecie" value="{{$processo->especie}}" readonly placeholder="Especie">
                </div>
                <div class=" col-6">
                <label for="Inputespecie" class="form-label">Nome do Juiz</label>
                        <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{$processo->juiz->name}}" readonly>
                </div>
            </div>

            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{$processo->criado_por }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{ $processo->actualizado_por  }}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <a class="btn btn-secondary" href="/processo">Voltar <i class="bi bi-backspace"></i></a>
            </div>
        </form>
    </div>


</div>


@endsection