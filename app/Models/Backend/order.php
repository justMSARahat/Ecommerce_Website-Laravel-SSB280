<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

	public function product(){
		return $this->belongsTo(Product::class);
	}

    public $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'shipping_address',
    	'division_id',
    	'district_id',
    	'zip_code',
    	'message',
    	'product_finalprice',
    	'pricewithcoupon',
    	'is_paid',
    	'payment_id',
    	'transaction_id'
    ];
}
