@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Editar Funcionário - <strong>{{$employee->full_name}}</strong></div>

        <div class="card-body">
            <form method="post" action="{{route('employees.update', $employee)}}" autocomplete="off">
                @csrf
                @method('PATCH')
                @include('employees.form')
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
