@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Cadastrar Funcionário</div>

        <div class="card-body">
            <form method="post" action="{{route('employees.store')}}" autocomplete="off">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="employeeName" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="employeeName" name="name" value="{{isset($employee) ? $employee->name : old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="employeeUsername" class="form-label">Login</label>
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="employeeUsername" name="username" value="{{isset($employee) ? $employee->username : old('username')}}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2 mb-3">
                    <div class="col-md-5">
                        <label for="employeePass" class="form-label">Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="employeePass" name="password" value="{{isset($employee) ? $employee->password : old('password')}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="employeePassConfirm" class="form-label">Confirme a senha</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="employeePassConfirm" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
