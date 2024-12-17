<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Customer extends Model  
{  
    use HasFactory;  

    protected $table = 'customers';  

    protected $fillable = [  
        'customerNumber',  
        'customerName',  
        'contactLastName',  
        'contactFirstName',  
        'phone',  
        'addressLine1',  
        'addressLine2',  
        'city',  
        'state',  
        'postalCode',  
        'country',  
        'salesRepresentative',  
        'creditLimit',  
    ]; 
    public function employee(){
        return $this->belongsTo(Employee::class,'salesRepresentative','employeeNumber');
    } 

    public function orders()  
    {  
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');  
    } 
    
    public function payments(){
        return $this->hasMany(Payment::class, 'customerNumber','customerNumber');
    }
}