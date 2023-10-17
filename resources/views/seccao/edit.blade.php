@extends('layouts.main')
@section('title','Editar Seccao')
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
        <form action="/sessao/{{$sessao->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nome da secção</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$sessao->name}}">
                </div>
            </div>
            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{ $sessao->criado_por }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{auth()->user()->name}}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a class="btn btn-secondary" href="/sessao">Voltar <i class="bi bi-backspace"></i></a>
              </div>
        </form>
    </div>

</div>

@endsection

