@extends('layouts.app') @section('content')
    <h1>Bienvenido usuario {{auth()->user()->getName()}}</h1>
    <div class="container" >
        <button class="btn btn-primary">Agregar</button>
        <button class="btn btn-primary">Editar</button>
        <button class="btn btn-primary">Eliminar</button>
    </div>
    <br>
    <p>Por ahora no hay productos disponibles</p>
@endsection