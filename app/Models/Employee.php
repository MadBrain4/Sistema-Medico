<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'age', 'phone', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function medicalVisits()
    {
        return $this->hasMany(MedicalVisit::class);
    }
}
