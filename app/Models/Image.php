<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Definir la tabla
    protected $table = 'products_images';
    //Definir llave primaria
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public  $timestamps = false;
    //Definir atributos
    protected $fillable = [
        'product_id','name','directory','order'
    ];
    
    //Relación Image - Product 1:M
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
