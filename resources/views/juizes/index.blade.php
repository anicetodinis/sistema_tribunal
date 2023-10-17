@extends('layouts.main')
@section('title','View Juiz')
@section('content')

<div class="container mt-5">
    @if(session('create'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
    <p>{{session('create')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('delete'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <p>{{session('delete')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
        <p>{{session('update')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form class="d-flex mb-4 gap-2" action="/juiz" method="GET" class="mb-5">
     <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
     <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
    </form>
    <!-- Table of the System-->
    <table class="table">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Id do Juiz</th>
            <th scope="col">Nome do Juiz</th>
            <th scope="col">Secção do Juiz</th>
            <th scope="col">Criado Por</th>
            <th scope="col">Actualizado Por</th>
            <th scope="col">Acção</th>
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
                <td class="row gap-2">
                    <a class="btn btn-success col" href="/juiz/{{ $item->id }}"  aria-disabled="true"><i class="bi bi-eye-fill"></i></a>
                    <a class="btn btn-warning col" href="/juiz/{{ $item->id }}/edit"   aria-disabled="true"><i class="bi bi-pencil"></i></a>
                    @role('Admin')
                    <form action="/juiz/{{ $item->id }}" method="post" class="col">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger "><i class="bi bi-trash3-fill"></i></button>
                    </form>
                    @endrole
                </td>
            </tr>
                @endforeach
        </tbody>
    </table>

    <div class="d-grid gap-4 d-md-block mt-4">
      <a class="btn btn-primary" href="/juiz/create">Cadastrar Juiz <i class="bi bi-plus-circle"></i></a>
      <a class="btn btn-secondary" href="/">Voltar <i class="bi bi-backspace"></i></a>
    </div>
</div>
@endsection