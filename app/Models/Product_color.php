<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_color extends Model
{
    use HasFactory;
    protected $primaryKey = 'colorID' ;
    public $timestamps = false;
    protected $fillable = [
        'color_name',
        'color_code',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variant', 'color_id', 'product_id');
    }
}
