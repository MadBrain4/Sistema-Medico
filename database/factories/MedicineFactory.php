<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $presentations = config('medicines.presentations');
        
        return [
            'name' => $this->generateMedicineName(),
            'description' => $this->faker->sentence(),
            'presentation' => $this->faker->randomElement($presentations),
        ];
    }

    protected function generateMedicineName()
    {
        $baseNames = [
            'Paracetamol', 'Ibuprofeno', 'Amoxicilina', 'Diclofenaco',
            'Loratadina', 'Omeprazol', 'Metformina', 'Atorvastatina'
        ];
        
        $variants = [
            $this->faker->randomElement($baseNames),
            $this->faker->randomElement($baseNames) . ' ' . $this->faker->randomElement(['Plus', 'Forte', 'Simple']),
            $this->faker->randomElement($baseNames) . ' ' . $this->faker->randomElement(['Compuesto', 'Genérico']),
        ];
        
        return $this->faker->randomElement($variants);
    }
}
