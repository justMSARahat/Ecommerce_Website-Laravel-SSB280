<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
    	'id',
    	'title',
    	'slug',
    	'short_desc',
    	'desc',
    	'tags',
    	'quantity',
    	'reguler_price',
    	'offer_price',
    	'sku_code',
    	'product_type',
    	'cat_id',
    	'brand_id',
    	'is_featured',
    	'status',
    	'image'
    ];

	public function order(){
		return $this->hasMany(order::class,'');
	}

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class, 'cat_id');
    }
    public function cart()
    {
        return $this->hasMany(cart::class,'','id');
    }

}
