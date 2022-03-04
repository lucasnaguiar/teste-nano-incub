<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::select();

        if (request('name')) {
            $employees = $employees->where('full_name', 'like', '%'.request()->name.'%');
        }

        if (request('creation')) {
            $date = Carbon::parse(request('creation'));
            $employees = $employees->whereDate('created_at', $date);
        }

        $employees = $employees->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'full_name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'admin_id' => Auth::user()->id
        ]);

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'full_name' => $request->name,
            'username' => $request->username,
        ]);

        return redirect()->route('employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

    public function employeeSearchList()
    {
        $emps = Employee::EmployeeSearch(request()->search)->get(['id', 'full_name', 'username', 'balance']);

        return response($emps, '200');
    }
}
