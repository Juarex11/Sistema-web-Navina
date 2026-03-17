<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Definir la tabla
    protected $table = "products";
    //Definir llave primaria
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    //Definir atributos
    protected $fillable = [
        'name','description','sub_category','benefits','status','price','stock','discount','category_id'
    ];

    //Relación Product - Category 1:M
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Relación Product - Image 1:M
    public function images(){
        return $this->hasMany(Image::class);
    }
}
