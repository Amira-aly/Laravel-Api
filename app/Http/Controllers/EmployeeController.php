<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/employee
    public function index()
    {
        return Employee::all();
    }



    // post
    // http://127.0.0.1:8000/api/employee
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "salsry" => "required|numeric",
        ]);

        $emp = Employee::create($request->all());

        $response = [
            "employee" =>$emp,
            "message" =>"Insert Done",
        ];

        return response($request, 201);
    }

    // get
    // http://127.0.0.1:8000/api/employee/id
    public function show($id)
    {
        return Employee::find($id);
    }

    // put
    // http://127.0.0.1:8000/api/employee/id
    public function update(Request $request, Employee $id)
    {
        $request->validate([
            "name" => "required",
            "salsry" => "required|numeric",
        ]);

        $emp = Employee::find($id);
        $emp->update($request->all());
        $response = [
            "employee" =>$emp,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }

    // delete
    // http://127.0.0.1:8000/api/employee/id
    public function destroy($id)
    {
        return Employee::destroy($id);
    }
}
