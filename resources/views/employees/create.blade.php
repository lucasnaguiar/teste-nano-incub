@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Cadastrar Funcionário</div>

        <div class="card-body">
            <form method="post" action="{{route('employees.store')}}" autocomplete="off">
                @csrf
                @include('employees.form')
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
