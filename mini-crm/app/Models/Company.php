<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'email', 'logo', 'website'];




    public function getTakeImageAttribute()
    {
        return "/storage/" . $this->logo;
    }
}
