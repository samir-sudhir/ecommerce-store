<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Employee extends Model  
{  
    use HasFactory;  

    protected $table = 'employees';  

    protected $fillable = [  
        'employeeNumber',  
        'lastName',  
        'firstName',  
        'extension',  
        'email',  
        'officeCode',  
        'reportsTo',  
        'jobTitle',  
    ];  

    public function office()  
    {  
        return $this->belongsTo(Office::class, 'officeCode', 'officeCode');  
    } 
    
    public function customer(){
        return $this->hasMany(Customer::class,'salesRepresentative','employeeNumber');
    }
}