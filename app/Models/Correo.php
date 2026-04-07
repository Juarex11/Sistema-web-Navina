<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = 'correos';
    protected $primaryKey= 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'distrito',
        'correo',
        'mensaje',
    ];
}
