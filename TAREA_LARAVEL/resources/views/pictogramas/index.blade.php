<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')
@section('content')
<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Ruta</th>
    </tr>
    @foreach($pictogramas as $pictograma)
    <tr>
        <td>{{ $pictograma->nombre }}</td>
        <td><img src="{{ asset('public/' . $pictograma->ruta_imagen) }}" width="50"></td>
        <td>{{ $pictograma->ruta_imagen }}</td>
    </tr>
    @endforeach
</table>
@endsection
</body>
</html>