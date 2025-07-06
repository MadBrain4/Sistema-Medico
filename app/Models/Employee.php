<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

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
