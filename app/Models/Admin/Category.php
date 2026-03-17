<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    //Definir la tabla
    protected $table = 'categories';
    //Definir llave primaria
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    //Definir atributos
    protected $fillable = [
        'name','slug','status'
    ];

    //Relación Category - Product 1:M
    public function products(){
        return $this->hasMany(Product::class);
    }
}
