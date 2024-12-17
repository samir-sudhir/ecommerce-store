<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    // Get all Employees
    public function getAllEmployees()
    {
        return Employee::all();
    }

    // Create a new Employee
    public function createEmployee($data)
    {
        return Employee::create($data);
    }

    // Get Employee by employee number
    public function getEmployeeByNumber($employeeNumber)
    {
        return Employee::where('employeeNumber', $employeeNumber)->first();
    }

    // Update an Employee
    public function updateEmployee($employeeNumber, $data)
    {
        return Employee::where('employeeNumber', $employeeNumber)->update($data);
    }

    // Delete an Employee by employee number
    public function deleteEmployee($employeeNumber)
    {
        return Employee::where('employeeNumber', $employeeNumber)->delete();
    }
    public function getEmployeeByOfficeCode($officeCode){
        return Employee::where('officeCode', $officeCode)->get();
    }
}
