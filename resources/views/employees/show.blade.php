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
                        {{$employee->amount}}
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between">
                    <div class="col-auto me-auto" >
                        <a class="btn btn-secondary" href="{{route('employees.index')}}">Voltar</a>
                        <a class="btn btn-success" href="#">Editar</a>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-danger" href="#" onclick="confirm('Deseja excluir esse Funcionário do Banco de Dados?')">Excluir Funcionácio</a>
                    </div>
                </div>
            </div>
@endsection
