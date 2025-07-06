<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalVisit extends Model
{
    use HasFactory;

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
