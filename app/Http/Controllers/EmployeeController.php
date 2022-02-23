<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
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
}
