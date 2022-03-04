<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $transactionTypes = TransactionType::all();

        return view('transactions.create', compact('transactionTypes'));
    }


    public function store(StoreTransactionRequest $request) 
    {


        $employee = Employee::find($request->employee);

        DB::beginTransaction();

        $transaction = Transaction::create([
            'transaction_type_id' => $request->transaction_type,
            'amount' => $request->transaction_amount,
            'obs' => $request->transaction_description,
            'employee_id' => $employee->id,
            'admin_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $madeEffective = $employee->update([
            'balance' => $request->transaction_type == '1' ? $employee->balance + $request->transaction_amount : $employee->balance - $request->transaction_amount
        ]); 

        if ($transaction && $madeEffective) {
            DB::commit();
            session()->flash('status', 'Transação efetivada com sucesso.');
            return redirect()->route('transactions.index');
        }

        DB::rollBack();

        return redirect()->back()->with('status', 'Falha durante a transação. Tente Novamente.');
    }

}
