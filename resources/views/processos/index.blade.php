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


    <form class="d-flex mb-4 gap-2" action="/processo" method="GET" class="mb-5">
     <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
     <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
    </form>

    <!-- Table of the System-->
    <table class="table">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nrº Pro.</th>
            <th scope="col">Especie</th>
            <th scope="col">Nome do Juiz</th>
            <th scope="col">Data de Entrada</th>
            <th scope="col">Criado Por</th>
            <th scope="col">Actualizado Por</th>
            <th scope="col">Acção</th>
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
                <td class="row gap-2">
                    <a class="btn btn-success col" href="/processo/{{ $item->id }}"  aria-disabled="true"><i class="bi bi-eye-fill"></i></a>
                    <a class="btn btn-warning col" href="/processo/{{ $item->id }}/edit"   aria-disabled="true"><i class="bi bi-pencil"></i></a>
                    <!-- <a class="btn btn-warning col" href="/processo/{{ $item->id }}/addfile" aria-disabled="true"><i class="bi bi-file-earmark-pdf"></i></a> -->
                    @role('Admin')
                    <form action="/processo/{{ $item->id }}" method="post" class="col">
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
      <a class="btn btn-primary" href="/processo/create">Cadastrar Processo <i class="bi bi-plus-circle"></i></a>
      <a class="btn btn-secondary" href="/">Voltar <i class="bi bi-backspace"></i></a>
    </div>
</div>



<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Documento ao Processo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/processo" method="POST">
      <div class="modal-body">
      @csrf
            <div class="row mx-2">
                <div class="col-12">
                    <label for="InuptJuiz" class="form-label">Selecione o documento</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="documento" placeholder="selecione o doc.">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
	/* function removeElement(elemento) {
    var objTr = $(elemento).parent('td').parent('tr');
    alert("SIM");
    //objTr.remove()
} */

  $('#fileadd').addEventListener("click",function (event) {
    alert("SIM");
  });
});
</script>
@endsection