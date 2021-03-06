@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">

            Funcionários

            <form class="row g-3 mt-1" method="get" action="{{route('employees.index')}}" autocomplete="off">
                <div class="col-md-6">
                    <label for="inputSearch" class="visually-hidden"></label>
                    <input type="text" class="form-control" id="inputSearch" placeholder="Nome" name="name">
                </div>
                <div class="col-md-4">
                    <label for="inputDateCreation" class="visually-hidden"></label>
                    <input type="date" class="form-control" id="inputDateCreation" name="creation">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td><a class="employees-list-item" href="{{route('employees.show', $employee)}}">{{$employee->full_name}}</a></td>
                            <td>{{$employee->balance}}</td>
                            <td>{{date('d-m-Y', strtotime($employee->created_at))}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                {{$employees->links()}}
                <div class="row">
                    <div class="col">
                        <a href="{{route('employees.create')}}" class="btn btn-success">Cadastrar Novo</a>
                    </div>
                </div>
        </div>
    </div>

@endsection
