<?php

namespace Database\Factories;

use App\Models\Casos;
use Illuminate\Database\Eloquent\Factories\Factory;

class CasosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Casos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_viaje' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'id_usuario' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            'descripcion' => $this->faker->paragraph()
        ];
    }
}
