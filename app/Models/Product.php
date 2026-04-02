<?php

namespace App\Models;

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
        'name','description','use_mode','benefits','status','price','stock','discount','category_id','subcategory_id'
    ];

    //Precio final
    protected $appends = ['final_price'];
    public function getFinalPriceAttribute()
    {
    return $this->price - ($this->price * $this->discount / 100);
    }
    //Relación Product - Category 1:M
    public function category(){
        return $this->belongsTo(Category::class);
    }
    ////Relación Product - Subcategory 1:M
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    //Relación Product - Image 1:M
    public function images(){
        return $this->hasMany(Image::class);
    }
}
