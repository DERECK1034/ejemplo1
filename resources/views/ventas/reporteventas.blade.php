@extends('mascotas.principal')

@section('contenido')

<h1>Reporte de ventas</h1>
<br>
<table border = 1>
    <tr>
        <td>No venta</td>
        <td>Fecha</td>
        <td>Vendedor</td>
        <td>Monto venta</td>
        <td>Operaciones</td>
    </tr>

        @foreach ($reporteventas as $rv)
        <tr>
            <td>{{$rv->idven}}</td>
            <td>{{$rv->fecha}}</td>
            <td>{{$rv->vendedor}}</td>
            <td align = 'right'>{{$rv->montoventa}}</td>
            <td align = 'right'><a href="{{ route('editaventa', ['idven'=> $rv->idven]) }}">
                        <button type="button" class="btn btn-danger">Editar</button>
                    </a></td>
        @endforeach
        </tr>
</table>
@stop