@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">

            Transações
                
            <form class="row g-3 mt-1 align-items-center" method="get" action="{{route('transactions.index')}}" autocomplete="off">
                <div class="col-md-4">
                    <label for="inputSearch" class="visually-hidden"></label>
                    <input type="text" class="form-control" id="inputSearch" placeholder="Nome" name="name">
                </div>
                <div class="col-md-3">
                    <label for="inputDateCreation" class="visually-hidden"></label>
                    <input type="date" class="form-control" id="inputDateCreation" name="creation">
                </div>
                <div class="col-md-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="1" id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Entradas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="2" id="inlineRadio2">
                        <label class="form-check-label" for="inlineRadio2">Saídas</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                </div>
                
            </form>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Funcionário</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr class="@if($transaction->transaction_type_id == 1) table-success @else table-danger @endif">
                            <th scope="row">{{$transaction->id}}</th>
                            <td>{{$transaction->transactionType->name}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->obs}}</td>
                            <td><a class="employees-list-item" href="{{route('employees.show', $transaction->employee_id)}}">{{$transaction->employee->full_name}}</a></td>
                            <td> {{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                {{$transactions->links()}}
                <div class="row">
                    <div class="col">
                        <a href="{{route('transactions.create')}}" class="btn btn-success">Fazer Transação</a>
                    </div>
                </div>
        </div>
    </div>

@endsection
