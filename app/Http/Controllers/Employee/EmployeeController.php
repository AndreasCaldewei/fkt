<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index (Request $request) {

        $company_id = $request->query('company_id');

        if ($company_id) {
            $employees_filtered = Employee::all()->where('company_id', $company_id);
            return response()->json($employees_filtered);

        } else {
            $employees = Employee::all();
            return response()->json($employees);
        }

    }

    public function create(Request $request) {


        $validated = Validator($request->all(), [
            'company_id' => 'required',
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',

        ]);

        if ($validated->fails()) {
            $response['response'] = $validated->messages();
            return response()->json($validated->messages(), 400);
        }

        $employee = new Employee();
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;

        $employee->save();
        return response()->json($employee, 201);

    }
}
