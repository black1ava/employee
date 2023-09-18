<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(){
        return view('employee.create');
    }

    public function store(CreateEmployeeRequest $request){
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->save();

        toastr()->success('Create employee sucessfully');

        return redirect()->route('home.index');
    }

    public function edit(Employee $employee){
        return view('employee.edit', compact('employee'));
    }

    public function update(Employee $employee, EditEmployeeRequest $request){
        $employee = Employee::where('id', $employee->id)->first();
        $employee->name = $request->name;
        $employee->save();

        toastr()->success('Update employee sucessfully');

        return redirect()->route('home.index');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        toastr()->success('Update employee sucessfully');

        return redirect()->route('home.index');
    }
}
