<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function vehiculos():HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }
}
