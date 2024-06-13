@extends('master')

@section('titulo', 'Listado de Facturas')

@section('contenido')
<div class="container text-center">
    <h1>Listado de Facturas</h1>

    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <th>Actualizar</th>
                <th>Eliminar</th>
                <th>Número</th>
                <th>Detalles</th>
                <th>Cliente</th>
                <th>RFC</th>
                <th>Valor</th>
                <th>Archivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
            <tr>
                <td>
                    <a class="btn btn-warning" href="{{ route('facturas.edit', $factura->id) }}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['facturas.destroy', $factura->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar factura?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $factura->numero }}</td>
                <td>{{ strip_tags($factura->detalles) }}</td>
                <td>{{ $factura->cliente->nombre}}</td>
                <td>{{ $factura->cliente->rfc}}</td>
                <td>${{number_format($factura->valor)}}</td>
                <td><img src="{{asset('archivos/'.$factura->archivo.'')}}" width="150"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a class="btn btn-success" href="{{route('facturas.create')}}">Crear nueva factura</a>
</div>
<div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br> 
            <br>  
            <br>              
    </div>
@endsection
