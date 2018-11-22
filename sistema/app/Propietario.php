<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    //
    protected $table="propietarios";

    protected $fillable = [
        'dni', 'nombre', 'apellido','descripcion'
    ];

    public $timestamps = false;
}
