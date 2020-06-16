<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function getEmployee(){
        $employee = DB::table('employees')->get(['id', 'employee_name', 'employee_position']);
        return response()->json([
            'status'=>200,
            'data'=>$employee
        ]);
    }

    public function getEmployeeWork(){
        $employee = DB::table('employees')
                        ->join('companies', 'companies.id', '=', 'employees.company_id')
                        ->select('company_name', 'employee_name', 'employee_position')
                        ->get();
        return response()->json([
            'data'=>$employee
        ]);
    }
    
}
