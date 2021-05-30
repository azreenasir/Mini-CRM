<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'company_id', 'slug'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
