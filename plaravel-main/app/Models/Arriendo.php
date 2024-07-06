<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Arriendo extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function vehiculo():BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'patente_vehiculo');
    }

    public function clientes():BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'rut_cliente');
    }
}
