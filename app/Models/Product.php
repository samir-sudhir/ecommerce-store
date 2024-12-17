<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Product extends Model  
{  
    use HasFactory;  

    protected $table = 'products';  

    protected $fillable = [  
        'productCode',  
        'productName',  
        'productLine',  
        'productScale',  
        'productVendor',  
        'productDescription',  
        'quantityInStock',  
        'buyPrice',  
        'MSRP',  
    ];  

    public function productLine()  
    {  
        return $this->belongsTo(ProductLine::class, 'productLine', 'productLine');  
    }  
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,'productCode', 'productCode');
    }
}