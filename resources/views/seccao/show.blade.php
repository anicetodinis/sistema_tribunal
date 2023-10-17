@extends('layouts.main')
@section('title','Cadastro de Seccao')
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
        <h4>Dados da Secção</h4>
        <form action="/sessao" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nome da secção</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$sessao->name}}" readonly>
                </div>
            </div>
            
            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{ $sessao->criado_por }}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{ $sessao->actualizado_por }}" readonly>
                </div>
            </div>
            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                
                <a class="btn btn-secondary" href="/sessao">Voltar <i class="bi bi-backspace"></i></a>
              </div>

        </form>


        <!-- Table of the System-->
    <table class="table mt-4">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Id do Juiz</th>
            <th scope="col">Nome do Juiz</th>
            <th scope="col">Secção do Juiz</th>
            <th scope="col">Criado Por</th>
            <th scope="col">Actualizado Por</th>
        </tr>
        </thead>
        <tbody>
            @foreach($juiz as $item)
            <tr>
                <th scope="row">{{ $item->id  }}</th>
                <td>{{ $item->name  }}</td>
                <td>{{ $item->sessao->name  }}</td>
                <td>{{ $item->criado_por  }}</td>
                <td>{{ $item->actualizado_por  }}</td>
                
            </tr>
                @endforeach
        </tbody>
    </table>
    </div>

</div>

@endsection