<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Payment extends Model  
{  
    use HasFactory;  

    protected $table = 'payments';  

    protected $fillable = [  
        'customerNumber',  
        'checkNumber',  
        'paymentDate',  
        'amount',  
    ];  

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber', 'customerNumber');
    }
}
