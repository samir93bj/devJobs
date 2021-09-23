@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')

    @if (count($vacantes) > 0)

        <h1 class="text-3xl text-gray-700 m-0">
            Resultado de la busqueda: <span class="font-bold">{{$catagoria->nombre}}</span>
        </h1>
        <div class="my-10 bg-gray-700 p-10 shadow">
            @include('ui.listadovacantes')
        </div>
    @else
        <p class="text-center text-gray p-10 shadow">
           No hay vacantes que concuerden con tu busqueda
        </p>
    @endif

@endsection
