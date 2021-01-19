<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index () {
        return response()->json(Employee::all());
    }
}
