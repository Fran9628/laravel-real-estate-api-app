<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected $fillable = [ 
        'nombre',
        'email',
        'telefono'
    ];

    public function solicitudes()
    {
        return $this->hasMany(SolicitudVisita::class);
    }
}
