<h2  class="my-10 text-2xl text-white">
    Buscar una vacante
</h2>

<form
    method="POST"
    action="{{route('vacantes.buscar')}}"
    >
    @csrf

     {{-- LISTADO DE CATEGORIAS--}}
     <div class="mb-5">
        <label
            for="categoria"
            class="block text-white text-md mt-5 mb-2 uppercase font-bold"
            >Categoria:
        </label>
        <select
            id="categoria"
            class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
            name="categoria"
            >
            <option disabled selected>-Selecciona-</option>
            @foreach ($categorias as $categoria)
                <option {{old('categoria') == $categoria->id ? 'selected' : '' }} value="{{$categoria->id}}" >
                    {{$categoria->nombre}}
                </option>
            @endforeach
        </select>

        {{--Mostrar error en carga de categoria--}}
        @error('categoria')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
    </div>

    {{-- LISTADO DE UBICACIONES --}}
    <div class="mb-5">
        <label
            for="ubicacion"
            class="block text-white text-md mt-5 mb-2 uppercase"
            >Ubicacion:
        </label>
        <select
            id="ubicacion"
            class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
            name="ubicacion"
            >
            <option disabled selected>-Selecciona-</option>
            @foreach ($ubicaciones as $ubicacion)
                <option {{old('ubicacion') == $ubicacion->id ? 'selected' : '' }} value="{{$ubicacion->id}}">
                    {{$ubicacion->nombre}}
                </option>
            @endforeach
        </select>

            {{--Mostrar error en carga de ubicaciones--}}
            @error('ubicacion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <span class="block"> {{$message}}</span>
            </div>
            @enderror
    </div>

    <button
        type="submit"
        class="bg-gray-200 w-full text-gray-900 hover:bg-gray-500 hover:text-white  font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-5"
    >
        Buscar Vacantes
    </button>
</form>
