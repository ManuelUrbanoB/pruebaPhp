<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoRol extends Model
{
    protected $table = "empleado_rols";
    protected $fillable = ['empleado_id','rol_id'];
}
