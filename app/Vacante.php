<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{

    protected $fillable = [
        'titulo','imagen','descripcion','skills','categoria_id','experiencia_id','ubicacion_id','salario_id'
    ];


    //Relacion de 1:1 Categoria y Vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

     //Relacion de 1:1 Categoria y Vacante
     public function salario()
     {
        return $this->belongsTo(Salario::class);
     }

    //Relacion de 1:1 Categoria y Vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    //Relacion de 1:1 Categoria y Vacante
    public function experiencia()
    {
        return $this->belongsTo(experiencia::class);
    }

    //Relacion y 1:1 Reclutador y Vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relacion de 1:n vacante y candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

}
