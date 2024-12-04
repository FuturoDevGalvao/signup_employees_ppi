<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Nome aleatório
            'age' => $this->faker->numberBetween(18, 65), // Idade entre 18 e 65
            'email' => $this->faker->unique()->safeEmail, // Email único
            'password' => bcrypt('password'), // Senha padrão hashada
            'wage' => $this->faker->randomFloat(2, 1200, 10000), // Salário entre 1200.00 e 10000.00
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Employee $employee) {
            // Criar dois telefones para o empregado
            Phone::factory(2)->create([
                'employee_id' => $employee->id // Associar cada telefone ao empregado
            ]);

            // Criar dois endereços para o empregado
            Address::factory(2)->create([
                'employee_id' => $employee->id // Associar cada endereço ao empregado
            ]);
        });
    }
}
