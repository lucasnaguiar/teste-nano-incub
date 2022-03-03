@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Cadastrar Movimentação</div>

        <div class="card-body">
            <form method="post" action="#" autocomplete="off">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="transactionType" class="form-label">Tipo de Movimentação</label>
                        <select class="form-select @error('transaction_type') is-invalid @enderror" aria-label="type-select" id="transactionType" name="transaction_type">
                            <option selected value="">Selecione...</option>
                            @foreach($transactionTypes as $type)
                                <option value="{{$type->id}}">{{$type->name}} </option>
                            @endforeach
                        </select>
                        @error('transaction_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="transactionAmount" class="form-label">Valor</label>
                        <div class="input-group">
                            <span class="input-group-text" id="transactionAmount">$</span>
                            <input type="number" class="form-control @error('transaction_amount') is-invalid @enderror" id="transactionAmount" name="transaction_amount">
                            @error('transaction_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2 mb-3" x-data="setup()">
                    <div class="col-md-4">
                        <label for="employeeNameInput" class="form-label">Funcionário</label>
                        <input type="text" @keyup="getEmployees()" class="form-control @error('employee') is-invalid @enderror" id="employeeNameInput" value="" x-model="search" placeholder="Nome, Login">
                        @error('employee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror

                        <template x-if="selectedEmployee.amount">
                            <span class="mt-2" role="alert">
                                <strong x-text="'Saldo Atual: '+ selectedEmployee.amount"></strong>
                            </span>
                        </template>

                        <ul class="list-group">
                            <template x-for="employee in employees">
                                <li class="list-group-item employee-list-search" @click="selectEmployee(employee)" x-text="employee.full_name + ' ' + '('+ employee.username +')'"></li>
                            </template>
                        </ul>

                        <input type="hidden" id="selectedEmployeeId" name="employee">
                    </div>
                </div>
                <div class="row g-3 mt-2 mb-3">
                    <div class="form-group col-md-6">
                        <label for="transactionDescription">Descrição</label>
                        <textarea class="form-control @error('transaction_description') is-invalid @enderror"  id="transactionDescription" name="transaction_description">{{old('user_about')}}</textarea>
                        @error('transaction_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('extra-js')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function setup () {
            return {
                search:'',
                employees: [],
                selectedEmployee: {},
                
                getEmployees() {
                    if (this.search.length >= 2) {
                        axios.get('/employees?search=' + this.search)
                            .then(response => (this.employees = response.data))
                    } else {
                        return this.employees = []
                    }
                },
                selectEmployee(emp) {
                    this.selectedEmployee = emp
                    document.getElementById('selectedEmployeeId').value = this.selectedEmployee.id
                    document.getElementById('employeeNameInput').value = this.selectedEmployee.full_name
                    this.employees = []
                }
            }
        }
    </script>
@endsection
