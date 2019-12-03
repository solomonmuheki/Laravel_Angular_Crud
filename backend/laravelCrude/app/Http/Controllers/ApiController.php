<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class ApiController extends Controller
{
    //
    public function getAllEmployees() {
        // logic to get all students goes here
        $employees = Employee::get()->toJson(JSON_PRETTY_PRINT);
        return response($employees, 200);
      }
  
      public function createEmployee(Request $request) {
        // logic to create a student record goes here
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->designation = $request->designation;
        $employee->mobile = $request->mobile;
        $employee->save();
    
        return response()->json([
            "message" => "Employee record created"
        ], 201);
      
      }
  
      public function getEmployee($id) {
        // logic to get a student record goes here
        if (Employee::where('id', $id)->exists()) {
            $employee = Employee::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee, 200);
          } else {
            return response()->json([
              "message" => "employee not found"
            ], 404);
          }
      }
  
      public function updateEmployee(Request $request, $id) {
        // logic to update a student record goes here
        
        if (Employee::where('id', $id)->exists()) {
            $employee = Employee::find($id);
            $employee->name = is_null($request->name) ? $employee->name : $request->name;
            $employee->email = is_null($request->email) ? $employee->email : $request->email;
            $employee->designation = is_null($request->designation) ? $employee->designation : $request->designation;
            $employee->mobile = is_null($request->mobile) ? $employee->mobile : $request->mobile;
            $employee->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "employee not found"
            ], 404);
            
        }
      }
  
      public function deleteEmployee ($id) {
        // logic to delete a student record goes here
        if(Employee ::where('id', $id)->exists()) {
            $employee  = Employee ::find($id);
            $employee->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "employee not found"
            ], 404);
          }
      }
}
