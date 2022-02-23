<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'username', 'password', 'amount', 'admin_id'];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
