@foreach ($categorias as $categoria)
    <a href="{{route('categorias.show', [$categoria])}}"
        class="text-white text-sm uppercase font-bold p-3 hover:text-gray-400"
    >
        {{ $categoria->nombre }}
    </a>
@endforeach
