<?php

namespace Database\Factories;

use App\Models\Input;
use Illuminate\Database\Eloquent\Factories\Factory;

class InputFactory extends Factory
{

    protected $model = Input::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'value' => $this->faker->firstName
        ];
    }
}
