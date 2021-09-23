<?php

namespace App\Http\Controllers;


use App\Categoria;
use App\Experiencia;
use App\Salario;
use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;
use illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    /*AUTENTICACION PARA ACCEDER
    public function __construct()
    {
        // revisar el eusuario este registrado y autenticado
        $this->middleware(['auth','verified']);
    }*/

    /*FUNCION PARA RENDERIZAR EL INDEX*/
    public function index()
    {
        /*$vacantes = auth()->user()->vacantes()->paginate(8);*/
        if(auth()->user()){
            $vacantes = auth()->user()->vacantes()->simplePaginate(4);
        }else{
            $vacantes = Vacante::where('activa',1)->latest('id')->simplePaginate(4);
        }

        return view('vacantes.index', compact('vacantes'));
    }


    /*FUNCION PARA RENDERIZAR VISTA PARA CREAR*/
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create')
                    ->with('categorias',$categorias)
                    ->with('experiencias',$experiencias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('salarios',$salarios);
    }


    /*FUNCION PARA ALMACENAR*/
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'imagen' => 'required',
            'descripcion' => 'required|min:50',
            'skills' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
        ]);

        //ALMACENAR EN LA DB
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'imagen' => $data['imagen'],
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
        ]);

        return redirect()->action('VacanteController@index');
    }


    /*FUNCION PARA RENDERIZAR UN ELEMENTO*/
    public function show(Vacante $vacante)
    {
        return view('vacantes.show')->with('vacante',$vacante);
    }


    /*FUNCION PARA RENDERIZAR VISTA EDITAR*/
    public function edit(Vacante $vacante)
    {

        $this->authorize('view',$vacante);

        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.edit')
                    ->with('vacante', $vacante)
                    ->with('categorias',$categorias)
                    ->with('experiencias',$experiencias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('salarios', $salarios);
    }

    /*FUNCIONAR PARA ACTUALIZAR ELEMENTO */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update',$vacante);

        //Validacion
           $data = $request->validate([
            'titulo' => 'required|min:8',
            'imagen' => 'required',
            'descripcion' => 'required|min:50',
            'skills' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
        ]);

        //ALMACENAR EN LA DB
            $vacante->titulo = $data['titulo'];
            $vacante->imagen = $data['imagen'];
            $vacante->descripcion = $data['descripcion'];
            $vacante->skills = $data['skills'];
            $vacante->categoria_id = $data['categoria'];
            $vacante->experiencia_id = $data['experiencia'];
            $vacante->ubicacion_id = $data['ubicacion'];
            $vacante->salario_id = $data['salario'];

            $vacante->save();

            return redirect()->action('VacanteController@index');
    }

    /*FUNCION PARA DESTRUIR UN ELEMENTO*/
    public function destroy(Vacante $vacante, Request $request)
    {
        $this->authorize('delete',$vacante);

        $vacante->delete();

        return response()->json(['mensaje' => 'Se elimino la Vacante'.$vacante->titulo]);
    }

    //FUNCION PARA SUBIR LAS IMAGENES
    public function imagen(Request $request){

        $imagen = $request->file('file'); //Tomamos lo que se mando desde el front
        $nombreImagen = time().'.'.$imagen->extension(); //tomamos el nombre de la imagen generado con la funcion time()
        $imagen->move(public_path('storage/vacantes'),$nombreImagen ); //movemos el archivo temporal a la storage/vacantes
        return response()->json(['correcto' => $nombreImagen]); //
    }

    /*FUNCION PARA BORRAR UNA IAMGEN*/
    public function borrarimagen(Request $request){

        if($request->ajax()){
           $imagen = $request->get('imagen');

            if(File::exists('storage/vacantes/' . $imagen)){
                File::delete('storage/vacantes/' . $imagen);
            }

            return response('Imagen Eliminada',200);
        }

    }

    /*FUNCION PARA CAMBIAR EL ESTADO DE UNA VACANTE*/
    public function estado(Request $request, Vacante $vacante)
    {

        //LEER NUEVO ESTADO Y ASIGNARLO
        $vacante->activa = $request->estado;

        //GUARDARLO EN DB
        $vacante->save();

        //return response()->json(['respuesta' => 'Correcto']);
    }


    //FUNCION PARA BUSCAR VACANTE
    public function buscar(Request $request)
    {
       //Validar
       $data = $request->validate([
           'categoria' => 'required',
           'ubicacion' => 'required'
       ]);

       //Asignar Valores
       $categoria = $data['categoria'];
       $ubicacion = $data['ubicacion'];

        /*$vacantes = Vacante::where([
            'categoria_id' => $categoria,
            'ubicacion_id' => $ubicacion
            ])->get();*/

       $vacantes = Vacante::latest()
                            ->where('categoria_id',$categoria)
                            ->orWhere('ubicacion_id',$ubicacion)
                            ->get();

       return view('buscar.index',compact('vacantes'));
    }

    //FUNCION PARA MOSTRAR RESULTADOS DE BUSQUEDA
    public function resultados()
    {
        return "mostrando resultado...";
    }
}
