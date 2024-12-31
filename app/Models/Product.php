<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'productID';
    protected $fillable = [
        'product_code',
        'product_name',
        'description',
        'slug',
        'price',
        'discount',
        'views',
        'featured',
        'category_id',
        'brand_id',
    ];

    public function images()
    {
        return $this->hasMany(Product_image::class, 'product_id', 'productID');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'categoryID');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brandID');
    }

    public function sizes()
    {
        return $this->belongsToMany(Product_size::class, 'product_variants', 'product_id', 'size_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Product_color::class, 'product_variants', 'product_id', 'color_id');
    }

    public function variants()
    {
        return $this->hasMany(Product_variant::class, 'product_id', 'productID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'productID');
    }
}
