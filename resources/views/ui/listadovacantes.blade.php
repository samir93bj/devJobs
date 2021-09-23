<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach ($vacantes as $vacante)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-gray-900">{{ $vacante->titulo }}</h2>
            <p class="block text-gray-400 font-nombre my-2">
                {{$vacante->categoria->nombre}}
            </p>
            <p class="block text-gray-400 font-normal my-2">
                Ubicacion: <span class="font-bold text-gray-700">{{$vacante->ubicacion->nombre}}</span>
            </p>
            <p class="block text-gray-400 font-normal my-2">
                Experiencia: <span class="font-bold text-gray-700">{{$vacante->experiencia->nombre}}</span>
            </p>

            <a  class="bg-gray-700 text-white mt-2 px-3 py-3 inline-block rounded font-bold text-sm"
                href="{{ route('vacantes.show',['vacante' => $vacante->id]) }}"
            >Ver Vacante
            </a>
        </li>
    @endforeach
</ul>
