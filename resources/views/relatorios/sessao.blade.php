<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <title> Lista de Seccoes</title>
    <style>
        .attendance-table table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
        }
        .blank-cell{
        min-width: 50px;
        }
        .attendance-cell{
        padding: 8px;
        }
        .attendance-table table th.attendance-cell, .attendance-table table td.attendance-cell {
        border: 1px solid #000;
        }
        .col {
            padding-top: 10px;
        }
    </style>
    <body>
    <h2>Todas as Sessoes</h2>
      <div class="attendance-table">
        <table class="table-bordered">
            <tr>
                <th class="attendance-cell">
                    ID</th>
                <th class="attendance-cell">Nome da Secção</th>
                <th class="attendance-cell">
                    Criado Por</th>
                <th class="attendance-cell">Actualizado Por</th>
            </tr>
            @foreach($sessao as $item)
                <tr>
                    <td class="attendance-cell">{{ $item->id }}</td>
                    <td class="attendance-cell">{{ $item->name}}</td>
                    <td class="attendance-cell">{{ $item->criado_por }}</td>
                    <td class="attendance-cell">{{ $item->actualizado_por }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <h4> Numero de Sessoes: {{ $sessao->count() }} </h4>
</body>
</html>
