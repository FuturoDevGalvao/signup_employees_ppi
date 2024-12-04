<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'road' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'cep' => $this->faker->postcode,
            'state' => $this->faker->stateAbbr,
            'complement' => $this->faker->secondaryAddress,
            'employee_id' => null, // Será associado ao Employee quando criado
        ];
    }
}
