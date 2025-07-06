<?php

namespace Database\Factories;

use App\Models\MedicalVisit;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicineRequest>
 */
class MedicineRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $doses = [
            '1 tableta cada 8 horas',
            '2 cápsulas al día',
            '5 ml cada 12 horas',
            '1 aplicación tópica diaria',
            '1 inyección semanal',
            '1 tableta en la mañana',
            '2 tabletas al acostarse',
            '1 cucharada cada 6 horas',
            '1 comprimido cada 24 horas',
            '1 tableta cada 12 horas'
        ];

        return [
            'medical_visit_id' => MedicalVisit::factory(),
            'medicine_id' => Medicine::factory(),
            'dose' => $this->faker->randomElement($doses),
        ];
    }

    // Estado para dosis específicas
    public function withDose(string $dose)
    {
        return $this->state(function (array $attributes) use ($dose) {
            return [
                'dose' => $dose,
            ];
        });
    }

    // Estado para un medicamento específico
    public function forMedicine(Medicine $medicine)
    {
        return $this->state(function (array $attributes) use ($medicine) {
            return [
                'medicine_id' => $medicine->id,
            ];
        });
    }
}
