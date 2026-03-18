<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    protected $model = \App\Models\Direccion::class;

    public function definition()
    {
        return [
            'canton' => $this->faker->city,
            'calle_principal' => $this->faker->streetName,
            'calle_secundaria' => $this->faker->streetName,
            'referencia' => $this->faker->sentence(3),
            'observacion' => $this->faker->optional()->sentence(4),
        ];
    }
}