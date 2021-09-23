
@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10 mb-10 uppercase">Administrar Vacantes</h1>
    <div class="table w-full p-2">

    @if(count($vacantes) > 0)

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-500 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-white">
                        <div class="flex items-center justify-center">
                            ID
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-white">
                        <div class="flex items-center justify-center">
                            TITULO VACANTE
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-white">
                        <div class="flex items-center justify-center">
                            ESTADO
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-white">
                        <div class="flex items-center justify-center">
                            CANDIDATOS
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-white">
                        <div class="flex items-center justify-center">
                            ACCIONES
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($vacantes as $vacante)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-3 border-r">{{$vacante->id}}</td>
                        <td class="p-3 border-r">
                            <div>
                                <div class="text-sm leading-5 font-bold font-medium text-gray-900">{{$vacante->titulo}}</div>
                                <div class="text-sm leading-5 text-gray-500">Categoria: {{$vacante->categoria->nombre}}</div>
                            </div>
                        </td>
                        <td class="p-3 border-r">
                            <estado-vacante
                                estado="{{ $vacante->activa }}"
                                vacante-id="{{ $vacante->id }}"
                            ></estado-vacante>
                        </td>
                        <td class="p-3 border-r"><a href="{{ route('candidatos.index',['id'=>$vacante->id]) }}">{{$vacante->candidatos->count()}} Candidatos</a></td>
                        <td>
                            <a href="{{route('vacantes.edit',[$vacante])}}" class="bg-green-500 p-2 px-5 font-bold  text-white hover:shadow-lg text-xs ">Edit</a>
                            <eliminar-vacante
                                            vacante-id={{$vacante->id}}
                            ></eliminar-vacante>
                            <a href="{{route('vacantes.show',[$vacante])}}" class="bg-blue-500 p-2 px-5 font-bold text-white hover:shadow-lg text-xs ">Ver</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

     {{ $vacantes->links() }}

    @else
        <p class="text-center mt-10 text-gray-700">No tienes vacantes aun</p>
    @endif

    @section('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
@endsection
