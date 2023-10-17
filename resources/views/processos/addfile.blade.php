@extends('layouts.main')
@section('title','Add Doc Processo')
@section('content')
<div class="container">
    <div class="card mt-5 py-5 shadow-lg">
        <form action="/documento" method="POST">
            @csrf
            <div class="row mx-2">
                <div class="col-12">
                    <label for="InuptJuiz" class="form-label">Nr.º Processo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$processo->numero_processo}}" disabled>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="processo_id" value="{{$processo->id}}" readonly>

                </div>
                
            </div>

            <div class="row mx-2">
                <div class="col-12">
                <label for="Inputespecie" class="form-label">Selecione o ficheiro</label>
                    <input type="file" class="form-control" name="name" id="Inputespecie" placeholder="Ficheiro">
                </div>
                
            </div>

            

            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{ auth()->user()->name }}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-secondary" href="/processo">Voltar <i class="bi bi-backspace"></i></a>
            </div>
        </form>
    </div>

</div>
@endsection