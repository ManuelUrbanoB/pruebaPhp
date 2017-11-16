<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = ['nombre','email','sexo','area_id','boletin','descripcion'];

    
}
