<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla asociada a este modelo
    protected $table = 'usuarios';
    protected $fillable = [
        'user',
        'clave',
        'email',
        'nombres',
        'ap_paterno',
        'ap_materno',        
        'telefono',
        'direccion',
        'rut'
    ];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Si la clave primaria no es 'id', especifica el nombre aquí
    protected $primaryKey = 'id'; // Cambia 'id' por el nombre real de la clave primaria si es diferente

    public function rutas()
    {
        return $this->hasMany(Route::class , 'user_id');
    }

}