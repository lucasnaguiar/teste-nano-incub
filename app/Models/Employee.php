<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  Dyrynda\Database\Support\CascadeSoftDeletes;



class Employee extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $fillable = ['full_name', 'username', 'password', 'amount', 'admin_id'];

    protected $cascadeDeletes = ['transactions'];


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
