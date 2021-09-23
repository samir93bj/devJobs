@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <div class="my-10 bg-gray-700 p-10 shadow">
        <h1 class="text-3xl text-white m-0">
            Categoria:
            <span class="font-bold">{{$categoria->nombre}}</span>
        </h1>

        @include('ui.listadovacantes')
    </div>
@endsection
