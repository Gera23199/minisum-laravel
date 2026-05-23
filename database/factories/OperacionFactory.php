<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operacion>
 */
class OperacionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $numeroUno = fake()->numberBetween(1, 100);

        $numeroDos = fake()->numberBetween(1, 100);

        return [

            'nombre' => fake()->name(),

            'numero_uno' => $numeroUno,

            'numero_dos' => $numeroDos,

            'resultado' => $numeroUno + $numeroDos,

        ];
    }
}