@extends('layouts.main')
@section('title','Edit Processo')
@section('content')


<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mt-5 py-5 shadow-lg">
        <form action="/processo/{{$processo->id}}/update" method="POST">
            @csrf
            @method('PUT')
            <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nr.º Processo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$processo->numero_processo}}" name="numero_processo" placeholder="Nr. de Processo">
                </div>
                <div class="col-6">
                    <label for="Inputespecie" class="form-label">Especie</label>
                    <input type="date" class="form-control" name="data" id="Inputespecie" value="{{$processo->data}}">
                </div>
            </div>

            <div class="row mx-2">
                <div class="col-6">
                <label for="Inputespecie" class="form-label">Especie</label>
                    <input type="text" class="form-control" name="especie" id="Inputespecie" value="{{$processo->especie}}" placeholder="Especie">
                </div>
                <div class=" col-6">
                    <label for="InuptJuiz" class="form-label">Nome do Juiz</label>
                    <select class="form-select" name="juiz_id" aria-label="Default select example">
                        {{ $juiz = App\Models\Juiz::all() }}

                        <option selected value="{{$processo->juiz->id}}">{{$processo->juiz->name}}</option>

                        @foreach ( $juiz as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            

            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{$processo->criado_por }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{ auth()->user()->name }}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a class="btn btn-secondary" href="/processo">Voltar <i class="bi bi-backspace"></i></a>
            </div>
        </form>
    </div>

</div>
@endsection