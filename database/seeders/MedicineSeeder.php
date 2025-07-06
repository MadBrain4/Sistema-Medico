<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\MedicalVisit;
use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Medicine::factory()->count(5)->create();
    }
}
