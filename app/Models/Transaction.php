<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['transaction_type_id', 'amount', 'obs', 'employee_id', 'admin_id', 'created_at'];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
