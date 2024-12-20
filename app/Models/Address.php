<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['road', 'number', 'cep', 'state', 'complement', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
