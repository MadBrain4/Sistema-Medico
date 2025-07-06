<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalVisit>
 */
class MedicalVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $diagnoses = [
            'Resfriado común',
            'Hipertensión arterial',
            'Diabetes mellitus',
            'Lumbalgia',
            'Ansiedad',
            'Infección respiratoria',
            'Gastritis',
            'Migraña',
            'Artritis',
            'Dermatitis'
        ];

        return [
            'employee_id' => Employee::factory(),
            'visit_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'reason' => $this->faker->randomElement($diagnoses),
            'observations' => $this->faker->paragraph(2),
        ];
    }

    // Estado para visitas recientes (últimos 7 días)
    public function recent()
    {
        return $this->state(function (array $attributes) {
            return [
                'visit_date' => $this->faker->dateTimeBetween('-7 days', 'now'),
            ];
        });
    }

    // Estado para visitas con diagnóstico específico
    public function withReason(string $reason)
    {
        return $this->state(function (array $attributes) use ($reason) {
            return [
                'reason' => $reason,
            ];
        });
    }
}
