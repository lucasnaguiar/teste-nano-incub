<?php

namespace App\Http\Controllers;

use App\Models\TransactionType;
use Illuminate\Http\Request;

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

}
