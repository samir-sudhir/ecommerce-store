<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails'; 
    public $timestamps = false;
    

    protected $fillable = [
        'orderNumber',
        'productCode',
        'quantityOrdered',
        'priceEach',
        'orderLineNumber',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderNumber', 'orderNumber');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productCode', 'productCode');
    }
}
