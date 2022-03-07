<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;

class MinBalance implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($transactionTypeId, $transactionAmount, $employeeId)
    {
        $this->employee = Employee::find($employeeId);
        $this->transactionTypeId = $transactionTypeId;
        $this->transactionAmount = $transactionAmount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->employee->balance <  $this->transactionAmount && $this->transactionTypeId == '2')
            return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  $this->employee->full_name . ' não possui saldo suficiente. Saldo Atual: ' . $this->employee->balance ;
    }
}
