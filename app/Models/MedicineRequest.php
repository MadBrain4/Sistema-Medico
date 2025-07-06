<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineRequest extends Model
{
    use HasFactory;

    protected $fillable = ['medical_visit_id', 'medicine_id', 'dose'];

    public function medicalVisit()
    {
        return $this->belongsTo(MedicalVisit::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
