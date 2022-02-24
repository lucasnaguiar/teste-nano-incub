<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'username' => ['required', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',  Rule::unique('admins')->ignore(request()->employee->username, 'username')],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome Completo',
            'username' => 'Login',
        ];
    }
}
