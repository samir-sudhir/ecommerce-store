<?php

namespace Database\Seeders;  

use App\Models\Office;
use App\Models\Order;  
use App\Models\Payment;  
use App\Models\Product;  
use App\Models\Customer;  
use App\Models\Employee;  
use App\Models\OrderDetail;
use App\Models\ProductLine;  
use Illuminate\Database\Seeder;  

class DatabaseSeeder extends Seeder  
{  
    public function run()  
    {  
        ProductLine::factory(10)->create();  
        Office::factory(10)->create();  
        Employee::factory(10)->create();  
        Customer::factory(10)->create();  
        Product::factory(10)->create();  
        Order::factory(10)->create();  
        OrderDetail::factory(10)->create();  
        Payment::factory(10)->create();  
    }  
}