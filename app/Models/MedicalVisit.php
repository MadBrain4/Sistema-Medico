<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalVisit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id', 'visit_date', 
        'diagnosis', 'observations'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function medicineRequests()
    {
        return $this->hasMany(MedicineRequest::class);
    }
}
