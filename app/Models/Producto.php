<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['Nombre', 'Descripcion', 'Precio', 'estado', 'imagen'];
}

