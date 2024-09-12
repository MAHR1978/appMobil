<?php
// app/Models/Route.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    // Definir la tabla si el nombre no sigue la convención
    protected $table = 'routes';

    // Definir los campos que son asignables en masa
    protected $fillable = ['name', 'description'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id'); // Ajusta 'usuario_id' según el nombre de la columna en tu tabla de rutas
    }
}