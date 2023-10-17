@extends('layouts.main')
@section('title','Lista de Seccoes')
@section('content')
<div class="container mt-5">




    <!-- Table of the System-->
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

    <form class="d-flex mb-4 gap-2" action="/sessao" method="GET" class="mb-5">
     <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
     <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
    </form>
    <table class="table">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome da Secção</th>
            <th scope="col">Criado Por</th>
            <th scope="col">Actualizado Por</th>
            <th scope="col">Acção</th>
        </tr>
        </thead>
        <tbody>
            @foreach($sessao as $item)
        <tr>
            <th scope="row">{{ $item->id  }}</th>
            <td>{{ $item->name  }}</td>
            <td>{{ $item->criado_por  }}</td>
            <td>{{ $item->actualizado_por  }}</td>
            <td class="row gap-2">
                <a class="btn btn-success col" href="/sessao/{{ $item->id }}"  aria-disabled="true"><i class="bi bi-eye-fill"></i></a>
                <a class="btn btn-warning col" href="/sessao/{{ $item->id }}/edit"   aria-disabled="true"><i class="bi bi-pencil"></i></a>
                @role('Admin')
                <form action="/sessao/{{ $item->id }}" method="post" class="col">
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
      <a class="btn btn-primary" href="/sessao/create">Cadastrar Seccao <i class="bi bi-plus-circle"></i></a>
      <a class="btn btn-secondary" href="/" >Voltar <i class="bi bi-backspace"></i></a>
      <a class="btn btn-secondary" href="/sessao/view/document" target="_blank">Relatorio <i class="bi bi-archive"></i></a>
    </div>
</div>

@endsection

