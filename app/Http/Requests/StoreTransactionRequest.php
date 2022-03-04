<?php

namespace App\Http\Requests;

use App\Rules\MinBalance;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction_type' => ['required'],
            'employee' => ['required', 'exists:employees,id'],
            'transaction_amount' => ['bail', 'required','numeric', 'min:0.1', new MinBalance(request()->transaction_type, request()->transaction_amount, request()->employee)],
            'transaction_description' => ['required', 'max:100']
        ];
    }

    public function attributes()
    {
        return [
            'transaction_type' => 'Tipo de Movimentação',
            'transaction_amount' => 'Valor',
            'employee' => 'Funcionário',
            'transaction_description' => 'Descrição'
        ];
    }
}
