<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreateEmployeesTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('employees', function (Blueprint $table) {  
            $table->integer('employeeNumber')->primary();  
            $table->string('lastName');  
            $table->string('firstName');  
            $table->string('extension');  
            $table->string('email')->unique(); // Ensure email is unique  
            $table->string('officeCode')->nullable(); // Null allowed  
            $table->integer('reportsTo')->nullable(); // Nullable for employees without a manager  
            $table->string('jobTitle');  
            $table->timestamps();  
        });  

        // Adding foreign keys after the table has been created  
        Schema::table('employees', function (Blueprint $table) {  
            // Foreign key for officeCode  
            $table->foreign('officeCode')  
                  ->references('officeCode')  
                  ->on('offices')  
                  ->onDelete('set null');  

            // Foreign key for reportsTo (self-referencing)  
            $table->foreign('reportsTo')  
                  ->references('employeeNumber')  
                  ->on('employees')  
                  ->onDelete('set null');  
        });  
    }  

    public function down()  
    {  
        Schema::table('employees', function (Blueprint $table) {  
            // Drop foreign keys before dropping the table  
            $table->dropForeign(['officeCode']);  
            $table->dropForeign(['reportsTo']);  
        });  

        Schema::dropIfExists('employees');  
    }  
}