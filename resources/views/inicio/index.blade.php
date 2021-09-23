@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection


@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-gray-700">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-5xl text-gray-100">
                Dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-100 leading-tight">
                Encuentra un trabajo remoto o en tu pais
                <span class="text-gray-400 block">Para Desarroladores / Diseñadores Web</span>
            </h1>

            @include('ui.buscar')

        </div>

        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover" src="{{asset('img/4321.jpg')}}" alt="devjobs">
        </div>
    </div>

    <div class="my-10 bg-gray-700 p-10 shadow">
        <h1 class="text-3xl text-white m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('ui.listadovacantes')
    </div>
@endsection
