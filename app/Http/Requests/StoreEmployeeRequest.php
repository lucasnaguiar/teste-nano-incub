<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:employees,username', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome Completo',
            'username' => 'Login',
            'password' => 'Senha'
        ];
    }

}
