<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    
    public function getCompany(){
        $company = DB::table('companies')->get(['id', 'company_name']);
        return response()->json([
            'status'=>200,
            'data'=>$company
        ]);
    }

    public function getCompanyWorker(){
        $companyE = DB::table('companies')
                        ->join('employees', 'companies.id', '=', 'employees.company_id')
                        ->select('company_name', 'employee_name')
                        ->get();
        return response()->json([
            'data'=>$companyE
        ]);
    }
    
}
