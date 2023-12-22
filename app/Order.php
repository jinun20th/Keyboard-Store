<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
        'billing_province', 'billing_postalcode', 'billing_phone',
        'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_tax',
        'billing_total', 'payment_gateway', 'trans_id', 'shipped', 'error'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    // public function products()
    // {
    //     return $this->belongsToMany('App\Product')->withPivot('quantity');
    // }
}
