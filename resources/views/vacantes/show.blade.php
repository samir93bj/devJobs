@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
    integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">

            <p class="block text-gray-700 font-bold my-2 mb-4 uppercase">
                Categoria: <span class="font-normal lowercase"> {{ $vacante->categoria->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2 mb-4 uppercase">
                Salario: <span class="font-normal lowercase"> {{ $vacante->salario->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2 mb-4 uppercase">
                ubicación: <span class="font-normal lowercase"> {{ $vacante->salario->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2 mb-4 uppercase">
                Experiencia: <span class="font-normal lowercase"> {{ $vacante->experiencia->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2 mb-4">
                PUBLICADO: <span class="font-normal lowercase">{{ $vacante->created_at->diffForHumans() }}</span>
                Por: <span class="font-normal ">{{ $vacante->reclutador->name }}</span>
            </p>


            <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Conocimientos y Tecnologias</h2>

            @php
                $arraySkills = explode(",", $vacante->skills)
            @endphp

            @foreach ($arraySkills as $skill)
                <p class="inline-block border rounded border-gray-500 py-2 px-8 text-gray-700 font-bold my-2">
                    {{$skill}}
                </p>
            @endforeach

            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen" data-title="Vacante {{$vacante->titulo}}">
                <img src="/storage/vacantes/{{$vacante->imagen}}" class="w-40 mt-10">
            </a>

            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>
        </div>

        @if ($vacante->activa === 1)
            @include('ui.contacto')
        @endif

    </div>
@endsection
