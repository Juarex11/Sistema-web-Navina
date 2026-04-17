<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Definir la tabla
    protected $table = "blog";
    //Definir llave primaria
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    //Definir atributos
    protected $fillable = [ 'title','category_id','description','directory'];
    
    //Relacion con la taabla categoria

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
}

