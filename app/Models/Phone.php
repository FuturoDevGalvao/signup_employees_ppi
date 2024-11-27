<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
