<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index')->with('employees', $employees);
    } 

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee', $employee);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $rules = [
            "name" => "required|string|max:255",
            "job_title" => "required|string|max:100",
            "joining_date" => "required|date",
            "salary" => "required|numeric|min:0", 
            "email" => "nullable|email|max:255", 
            "mobile_no" => "required|string|max:15", 
            "address" => "nullable|string", 
        ];

        $messages = [
            'salary.min' => 'The salary must be greater than or equal to 0.',
        ];

        $request->validate($rules, $messages);

        $employee = Employee::create($request->all());

        return redirect()->route("employee.show", $employee->id);
    }

    public function destroy(Request $request, $id)  
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route("employee.index");
    }

    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);

        return view('employee.update')->with('employee', $employee);
    }
    public function update(Request $request, $id)
    {
        $rules = [
            "name" => "required|string|max:255",
            "job_title" => "required|string|max:100",
            "joining_date" => "required|date",
            "salary" => "required|numeric|min:0",
            "email" => "nullable|email|max:255",
            "mobile_no" => "required|string|max:15",
            "address" => "nullable|string",
        ];

        $request->validate($rules);

        $employee = Employee::find($id);

        $employee->update($request->all());

        return redirect()->route("employee.show", $employee->id);
    }

    public function search(Request $request)
    {
        $text = '%' . $request->search . '%';
        $employees = Employee::where('name', 'LIKE', $text)->paginate(10);; 
        return view('employee.index')->with('employees', $employees);
    }
}