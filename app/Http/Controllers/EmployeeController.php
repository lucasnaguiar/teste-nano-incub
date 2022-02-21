<?php

namespace App\Http\Controllers;

use App\EmployeeRepository;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index()
    {

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
}
