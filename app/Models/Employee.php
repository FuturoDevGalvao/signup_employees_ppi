<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'email', 'password', 'wage'];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
