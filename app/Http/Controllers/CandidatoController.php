<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Vacante;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{

    public function index(Request $request)
    {
        /*$vacante = Vacante::find($request['id']);
        return $vacante;*/

        $id_vacante = $request->route('id');

        //Obtener Vacante y candidatos
        $vacante = Vacante::findOrFail($id_vacante);
        $this->authorize('view',$vacante);

        return view('candidatos.index',compact('vacante'));
    }


    public function create()
    {
        //
    }


    //FUNCION PARA ALMACENAR POSTULANTE
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        //Almacenar ARchivo PDF
            if($request->file('cv')){
              $archivo = $request->file('cv');
              $nombreArchivo = time().".".$request->file('cv')->extension();
              $ubicacion = public_path('/storage/cv');
              $archivo->move($ubicacion, $nombreArchivo);
            }

        $vacante = Vacante::find($data['vacante_id']);
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo,
                ]);

        $reclutador = $vacante->reclutador;
        $reclutador->notify(new NuevoCandidato($vacante->titulo, $vacante->id));

        return back()->with('estado','Tus datos se enviaron correctamente! Exitos.');

        /*Una forma
        $candidato= new Candidato();
        $candidato->nombre = $data['nombre'];
        $candidato->email = $data['email'];
        $candidato->vacante_id = $data['vacante_id'];
        $candidato->vc = "123.pdf";

        $candidato->save();
        */

        /*Segunda Forma
        $candidato= new Candidato($data);
        $candidato->cv = "123.pdf";
        $candidato->save();*/

        /*Tercera Forma
        $candidato = new Candidato();
        $candidato->fill($data);
        $candidato->cv = "123.pdf";

        $candidato->save();*/
    }


    public function show(Candidato $candidato)
    {
        //
    }


    public function edit(Candidato $candidato)
    {
        //
    }

    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    public function destroy(Candidato $candidato)
    {
        //
    }
}
