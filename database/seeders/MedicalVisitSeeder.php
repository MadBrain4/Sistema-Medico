<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\MedicalVisit;
use App\Models\Medicine;
use App\Models\MedicineRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $employees = Employee::all();
            $medicines = Medicine::all();

            foreach ($employees as $employee) {
                $visits = MedicalVisit::factory()
                    ->count(2)
                    ->create(['employee_id' => $employee->id]);

                foreach ($visits as $visit) {
                    // Asegurar que haya al menos 2 medicinas disponibles
                    if ($medicines->count() >= 2) {
                        $randomMedicines = $medicines->random(2);
                        
                        $visit->medicineRequests()->createMany([
                            [
                                'medicine_id' => $randomMedicines[0]->id,
                                'dose' => '1 tableta cada 8 horas'
                            ],
                            [
                                'medicine_id' => $randomMedicines[1]->id,
                                'dose' => '1 aplicación tópica diaria'
                            ]
                        ]);
                    }
                }
            }

            // Visita reciente de ejemplo con verificación
            if ($employee = Employee::find(1)) {
                $recentVisit = MedicalVisit::factory()
                    ->recent()
                    ->create([
                        'employee_id' => $employee->id,
                        'reason' => 'Resfriado común'
                    ]);

                if ($medicine = Medicine::first()) {
                    $recentVisit->medicineRequests()->create([
                        'medicine_id' => $medicine->id,
                        'dose' => '1 tableta cada 6 horas'
                    ]);
                }
            }
        });
    }
}
