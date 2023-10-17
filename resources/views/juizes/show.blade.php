@extends('layouts.main')
@section('title','Show Juiz')
@section('content')
<div class="container">
    <div class="card mt-5 py-5 shadow-lg">
        <form action="/juiz" method="POST">
            @csrf
            <div class="row mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Nome do Juiz</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nome do Juiz" value="{{$juiz->name}}" readonly>
                </div>
                <div class=" col-6">
                    <label for="InuptJuiz" class="form-label">Nome da Seccao</label>
                    <select class="form-select" name="sessao_id" aria-label="Default select example" readonly>
                        <option selected >{{$juiz->sessao->name}}</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4 mx-2">
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Criado por</label>
                    <input type="text" class="form-control" name="criado_por" id="criado_por" value="{{$juiz->criado_por}}" readonly>
                </div>
                <div class="col-6">
                    <label for="InuptJuiz" class="form-label">Actualizado por</label>
                    <input type="text" class="form-control" name="actualizado_por" id="actualizado_por" value="{{$juiz->actualizado_por}}" readonly>
                </div>
            </div>

            <div class="d-grid gap-4 ms-3 d-md-block mt-4">
                <a class="btn btn-secondary" href="/juiz">Voltar <i class="bi bi-backspace"></i></a>
            </div>
        </form>


        <table class="table mt-4">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nrº Pro.</th>
            <th scope="col">Especie</th>
            <th scope="col">Nome do Juiz</th>
            <th scope="col">Data de Entrada</th>
            <th scope="col">Criado Por</th>
            <th scope="col">Actualizado Por</th>
        </tr>
        </thead>
        <tbody>
            @foreach($processo as $item)
            <tr>
                <th scope="row">{{ $item->numero_processo  }}</th>
                <td>{{ $item->especie  }}</td>
                <td>{{ $item->juiz->name  }}</td>
                <td>{{ $item->data  }}</td>
                <td>{{ $item->criado_por  }}</td>
                <td>{{ $item->actualizado_por  }}</td>
                
            </tr>
                @endforeach
        </tbody>
    </table>
    </div>

</div>
@endsection