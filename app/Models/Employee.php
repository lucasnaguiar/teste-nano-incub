<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['full_name', 'username', 'password', 'amount', 'admin_id'];
    use HasFactory;
}
