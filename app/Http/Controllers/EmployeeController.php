<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $message="This is your required details";
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    // Get all employees
    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        // return response()->json($employees);
    return success($this->message,200,$employees);
    }

    // Create a new employee
    
    public function show($employeeNumber)
    {
        $employee = $this->employeeService->getEmployeeByNumber($employeeNumber);
        if (!$employee) {
            // return response()->json(['message' => 'Employee not found'], 404);
            $message='Employee not found';
            return error($message,404);
        }
        // return response()->json($employee);
        return success($this->message,200,$employee);

    }

    // Update an existing employee
    public function update(Request $request, $employeeNumber)
    {
        $data = $request->all();
        $updated = $this->employeeService->updateEmployee($employeeNumber, $data);
        if (!$updated) {
            return response()->json(['message' => 'Employee not found or not updated'], 404);
        }
        return response()->json(['message' => 'Employee updated successfully']);
    }

    // Delete an employee by employee number
    public function destroy($employeeNumber)
    {
        $deleted = $this->employeeService->deleteEmployee($employeeNumber);
        if (!$deleted) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json(['message' => 'Employee deleted successfully']);
    }

    // ..getEmployeeByOfficeCode
    public function getEmployeeByOfficeCode($officeCode){
         $employee = $this->employeeService->getEmployeeByOfficeCode($officeCode);
         $message="This is your required data";
         return success($message,200,$employee);
    }
}
