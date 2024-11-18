<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
