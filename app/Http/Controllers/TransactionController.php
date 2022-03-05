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
use Illuminate\Database\Eloquent\Builder;

class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transaction::select();

        if (request()->has('name')) {
            $transactions = Transaction::whereHas('employee', function (Builder $query) {
                $query->where('full_name', 'like', '%'. request()->name .'%');
            });
        }

        if (request()->type == 1) {
            $transactions = $transactions->where('transaction_type_id', 1);
        }

        if (request()->type == 2) {
            $transactions = $transactions->where('transaction_type_id', 2);
        }

        if (request('creation')) {
            $date = Carbon::parse(request('creation'));
            $transactions = $transactions->whereDate('created_at', $date);
        }

        $transactions = $transactions->latest()->get();

        return view('transactions.index', compact('transactions'));
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
