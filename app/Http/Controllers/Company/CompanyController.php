<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index () {
        return response()->json(Company::all(), 200);
    }


    public function create(Request $request) {

        $company = new Company();

        $company->company_name = $request->company_name;

        $company->save();


        return response()->json($company, 201);


    }
}

