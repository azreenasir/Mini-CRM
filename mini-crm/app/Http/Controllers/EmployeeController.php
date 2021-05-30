<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create',[
            'employee' => new Employee(),
            'companies' => Company::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = $request->all();
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $fullname = $firstname . ' ' . $lastname;
        $employee['slug'] = Str::slug($fullname);

        $employee['company_id'] = request('company');

        Employee::create($employee);

        session()->flash('success', 'The employee was registered');

        /* return to employee page */
        return redirect()->to('employee');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employees = Employee::where('company_id', $employee->company_id)->latest()->get();
        return view('employees.show', compact('employee', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [

            'employee' => $employee,
            'companies' => Company::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $attr = $request->all();

        $attr['company_id'] = request('company');

        $employee->update($attr);

        session()->flash('success', 'The employee was registered');

        /* return to employee page */
        return redirect()->to('employee');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        session()->flash('error', "The Employee information was deleted");
        return redirect()->route('employees.index');
    }

}
