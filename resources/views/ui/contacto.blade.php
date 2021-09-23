<aside class="md:w-2/5 bg-gray-400 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta al Reclutador</h2>

    <form enctype="multipart/form-data" action="{{route('candidato.store')}}" class="" method="POST">
        @csrf

        {{--MOMBRE--}}
        <div class="mb-4">
            <label for="nombre" class="block text-white text-md font-bold mb-4">Nombre:</label>
            <input
                id="nombre"
                type="text"
                class="p-3 gb-gray-100 rounded form-input w-full @error('nombre') border border-red-500 @enderror"
                name="nombre"
                placeholder="Tu nombre"
                value="{{old('nombre')}}"
            >


            {{--Mostrar error en carga de categoria--}}
            @error('nombre')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-4 w-full mt-5" role="alert">
                    <span> {{$message}}</span>
                </div>
            @enderror
        </div>

        {{--Email--}}
        <div class="mb-4">
            <label for="email" class="block text-white text-md font-bold mb-4">Email:</label>
            <input
                id="email"
                type="email"
                class="p-3 gb-gray-100 rounded form-input w-full @error('nombre') border border-red-500 @enderror"
                name="email"
                placeholder="Tu email"
                value="{{old('Email')}}"
            >


            {{--Mostrar error en carga de categoria--}}
            @error('email')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-4 w-full mt-5" role="alert">
                    <span> {{$message}}</span>
                </div>
            @enderror
        </div>

        {{--CV--}}
        <div class="mb-4">
            <label for="cv" class="block text-white text-md font-bold mb-4">Curriculum (pdf):</label>
            <input
                id="cv"
                type="file"
                class="p-3 gb-gray-100 rounded form-input w-full @error('cv') border border-red-500 @enderror"
                name="cv"
            >


            {{--Mostrar error en carga de categoria--}}
            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-4 w-full mt-5" role="alert">
                    <span> {{$message}}</span>
                </div>
            @enderror
        </div>

        <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
        <input type="submit" class="bg-gray-800 w-full text-lg hover:bg-gray-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase rounded" value="contactar">
    </form>
</aside>
