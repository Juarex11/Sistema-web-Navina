<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteComentario extends Model
{
    protected $table = 'site_commentarios';

    protected $fillable = [
        'cliente',
        'comentario',
        'calificacion',
        'fecha',
        'foto',
    ];
}
