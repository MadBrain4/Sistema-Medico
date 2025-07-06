<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'description', 'presentation'];

    /**
     * Obtiene todas las presentaciones disponibles
     */
    public static function getAvailablePresentations()
    {
        return config('medicines.presentations');
    }

    public function medicineRequests()
    {
        return $this->hasMany(MedicineRequest::class);
    }
}
