@extends('layouts.app')
@section('content')

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nome Completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$employee->full_name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Login</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$employee->username}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Cadastrado por:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$employee->creator->full_name . ' em ' . date('d-m-Y', strtotime($employee->created_at))}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Saldo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$employee->balance}}
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between">
                    <div class="col-auto me-auto" >
                        <a class="btn btn-secondary" href="{{route('employees.index')}}">Voltar</a>
                        <a class="btn btn-success" href="{{route('employees.edit', $employee)}}">Editar</a>
                    </div>
                    <div class="col-auto">
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Deseja excluir esse Funcionário do Banco de Dados?')">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div class="card mt-3">
                <div class="card-header">
                    <p class="fw-bold">Movimentações de {{$employee->full_name}}</p>
                    
                    
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Descrição</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse($empTransactions as $transaction)
                                <tr class="@if($transaction->transaction_type_id == 1) table-success @else table-danger @endif">
                                    <th scope="row">{{$transaction->id}}</th>
                                    <td> {{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                                    <td>{{$transaction->transactionType->name}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->obs}}</td>
                                </tr>
                            @empty 
                            <tr>
                                <td>
                                    <p class="text-center">{{$employee->full_name . ' não possui nenhuma movimentação.'}}</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                        {{$empTransactions->links()}}
                </div>


        </div>
@endsection
