<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'email',
        'descripcion',
        'tipo_servicio',
        'id_empleado',
        'estado',
    ]; // Campos asignables masivamente

    // Relación con el modelo User (empleado asignado a la orden)
    public function empleado()
    {
        return $this->belongsTo(User::class, 'id_empleado');
    }
}
