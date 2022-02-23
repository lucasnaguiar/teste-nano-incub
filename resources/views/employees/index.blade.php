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
                        <th scope="col">Login</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td>{{$employee->full_name}}</td>
                            <td>{{$employee->username}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>

@endsection
