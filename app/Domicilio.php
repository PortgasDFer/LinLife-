<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = 'domicilios';
    protected $fillable = [
        'calle','noext','noint','cp','colonia','localidad','entidad','descripcion','id_user'
    ];
}
