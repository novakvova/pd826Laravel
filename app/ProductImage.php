<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'priority'
    ];
    /**
     * Get the product that owns the productImage.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);//('App\Category', 'foreign_key');
    }
}
