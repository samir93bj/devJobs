<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $vacantes = Vacante::latest()->where('activa','=',true)->take(10)->get();
        $ubicaciones = Ubicacion::All();

        return view('inicio.index',compact('vacantes','ubicaciones'));
    }
}
