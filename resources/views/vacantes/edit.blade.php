
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
<div class="bg-gray-300 max-w-screen-md mx-auto border rounded">
    <h1 class="text-2xl text-center mt-5 pt-5 uppercase">Editar Vacante: <span>{{$vacante->titulo}}</span></h1>

    <form
        action="{{ route('vacantes.update',[$vacante]) }}"
        method="POST"
        class="p-10"
    >
    @csrf
    @method('PUT')
            {{-- TITULO DE CATEGORIAS--}}
            <div class="">
                <label
                    for="titulo"
                    class="block text-gray-700 text-md mb-2 uppercase plac"
                    >Titulo Vacante:
                </label>
                <input
                    type="text" name="titulo" id="titulo" class="p-3 bg-withe rounded form-input w-full" placeholder="Titulo de la Vacante" value="{{$vacante->titulo}}">

                {{--Mostrar error en carga de titulo--}}
                @error('titulo')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror
            </div>

            {{-- LISTADO DE CATEGORIAS--}}
            <div class="mb-5">
                <label
                    for="categoria"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Categoria:
                </label>
                <select
                    id="categoria"
                    class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
                    name="categoria"
                    >
                    <option disabled selected>-Selecciona-</option>
                    @foreach ($categorias as $categoria)
                        <option {{$vacante->categoria_id == $categoria->id ? 'selected' : '' }} value="{{$categoria->id}}" >
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

            {{-- LISTADO DE EXPERIENCIAS --}}
            <div class="mb-5">
                <label
                    for="experiencia"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Experiencia:
                </label>
                <select
                    id="experiencia"
                    class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
                    name="experiencia"
                    >
                    <option disabled selected>-Selecciona-</option>
                    @foreach ($experiencias as $experiencia)
                        <option {{$vacante->experiencia_id == $experiencia->id ? 'selected' : '' }} value="{{$experiencia->id}}">
                            {{$experiencia->nombre}}
                        </option>
                    @endforeach
                </select>

                 {{--Mostrar error en carga de experiencia--}}
                 @error('experiencia')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <span class="block"> {{$message}}</span>
                    </div>
                 @enderror

            </div>

             {{-- LISTADO DE UBICACIONES --}}
            <div class="mb-5">
                <label
                    for="ubicacion"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Ubicacion:
                </label>
                <select
                    id="ubicacion"
                    class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
                    name="ubicacion"
                    >
                    <option disabled selected>-Selecciona-</option>
                    @foreach ($ubicaciones as $ubicacion)
                        <option {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : '' }} value="{{$ubicacion->id}}">
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

            {{-- LISTADO DE SALARIOS --}}
            <div class="mb-5">
                <label
                    for="salario"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Salario:
                </label>
                <select
                    id="salario"
                    class="block p-3 appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focu:outline-none focus:bg-white focus:border-gray-500 p-m bg-gray-100 w-full"
                    name="salario"
                    >
                    <option disabled selected>-Selecciona-</option>
                    @foreach ($salarios as $salario)
                        <option {{$vacante->salario_id == $salario->id ? 'selected' : '' }}  value="{{$salario->id}}">
                            {{$salario->nombre}}
                        </option>
                    @endforeach
                </select>

                {{--Mostrar error en carga de salario--}}
                @error('salario')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror
            </div>

            {{-- DESCRIPCION DE LA VACANTE A PUBLICAR --}}
            <div class="mb-5">
                <label
                    for="descripcion"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Descripcion del Puesto:
                </label>
                <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

                <input type="hidden" name="descripcion" id="descripcion" value="{{$vacante->descripcion}}">
            </div>

             {{-- SKILLS DE LA VACANTE A PUBLICAR --}}
             <div class="mb-5">
                <label
                    for="skill"
                    class="block text-gray-700 text-md mt-5 mb-5 uppercase"
                    >Habilidades y Conocimientos: <span class="xs lowercase">(Elige al menos 3)</span>
                </label>

                @php
                    $skills = ['PHP','JavaScript','Nodejs','Laravel','Sql','Postgre','Axios','React','Eloquent','FlexBox','HTML5','CSS3','Jquery'];
                @endphp

                <lista-skills
                    :skills="{{json_encode($skills)}}"
                    :oldskills="{{ json_encode( $vacante->skills  ) }}"
                ></lista-skills>

                 {{--Mostrar error en carga de salario--}}
                @error('skills')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <span class="block"> {{$message}}</span>
                    </div>
                @enderror

            </div>

            {{-- IMAGEN DE LA VACANTE A PUBLICAR --}}
            <div class="mb-5">
                <label
                    for="imagen"
                    class="block text-gray-700 text-md mt-5 mb-2 uppercase"
                    >Imagen de la Vacante:
                </label>
                <div class="dropzone rounded bg-gray-100" id="dropzoneDevJobs"></div>

                <input type="hidden" name="imagen" id="imagen" value="{{$vacante->imagen}}">

                <p id="error"></p>

                {{--Mostrar error en carga de la imagen--}}
                @error('imagen')
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                      <span class="block"> {{$message}}</span>
                  </div>
                @enderror
            </div>

            {{-- BOTON PARA GUARDAR VACANTE --}}
            <button
                type="submit"
                class="bg-gray-500 mb-5 mt-5 w-full hover:bg-gray-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
                >Editar Vacante
            </button>
    </form>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {

            //MEDIUM EDITOR//
            //Herramientas para edicion
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold','italic','underline','quote','anchor','justifyLeft','justifyCenter','justifyRight','justifyFull','orderedList','unorderedList','h2','h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: "Informacion de la Vacante"
                }
            });

            //insertamos el contenido en un value para ser enviado
            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });

            //llenamos el editor con el contenido del input hidden
            editor.setContent(document.querySelector('#descripcion').value)

            //////////////////////////////////////////////////////
           //DROPZONE
           const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
               url: "/vacantes/imagen",
               dictDefaultMessage: 'Sube aqui tu archivo',
               acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
               addRemoveLinks: true,
               dictRemoveFile: 'Borrar Archivo',
               maxFiles: 1,
               headers: {
                   'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
               },
               init: function(){
                   if(document.querySelector('#imagen').value.trim()){
                       let imagenPublicada = {};
                       imagenPublicada.size = 1234;
                       imagenPublicada.name = document.querySelector('#imagen').value;
                       imagenPublicada.nombreServidor = document.querySelector('#imagen').value;

                       this.options.addedfile.call(this, imagenPublicada);
                       this.options.thmbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                       imagenPublicada.previewElement.classList.add('dz-sucess');
                       imagenPublicada.previewElement.classList.add('dz-complete');
                    }
               },
               success: function(file, response){
                   //console.log(response);
                   //console.log(response.correcto);
                   document.querySelector('#error').textContent = ' ';

                   //Colocamos la respuesta del servidor en el input hidden
                   document.querySelector('#imagen').value = response.correcto;

                   //Añadir al objeto de archivo el nombre del servidor
                   file.nombreServidor = response.correcto;
               },
               /*error: function(file, response){
                    document.querySelector('#error').textContent = 'Formato no valido';
               },*/
               maxfilesexceeded: function(file){
                   if(this.files[1] != null){
                        this.removeFile(this.files[0]); //Eliminar el archivo anterior
                        this.addFile(file); //Agregar el nuevo archivo
                   }
               },
               removedfile: function(file, response){

                file.previewElement.parentNode.removeChild(file.previewElement); //funcion para eliminar las imagenes anteriores del DOM

                   console.log('El archivo borrado fue: ', file);

                   params = {
                        imagen: file.nombreServidor
                   }

                   axios.post('/vacantes/borrarimagen', params)
                            .then(respuesta => console.log(respuesta))
               }
           });

        })
    </script>
@endsection

