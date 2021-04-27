<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';
    protected $fillable = [
       'descripcion','unidades','costo','code_producto','baja'   
    ];
}
