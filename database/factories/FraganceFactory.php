<?php

namespace Database\Factories;

use App\Models\Fragance;
use Illuminate\Database\Eloquent\Factories\Factory;

class FraganceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fragance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'user_id' => $this->faker->numberBetween(1, 1000),
            'title' => $this->faker->monthName(),
            'category' => $this->faker->randomElement(['Male', 'Female', 'Sweet', 'Citrict', 'Refreshing']),
            'description' => $this->faker->text($maxNbChars = 100),
            'image' => $this->faker->randomElement([
                '1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', '6.jpeg', '7.jpeg', '8.jpeg', '9.jpeg', '10.jpeg',
                '11.jpeg', '12.jpeg', '13.jpeg', '14.jpeg', '15.jpeg', '16.jpeg', '17.jpeg', '18.jpeg', '19.jpeg', '20.jpeg',
                '21.jpeg', '22.jpeg', '23.jpeg', '24.jpeg', '25.jpeg'
            ]),
            'price' => $this->faker->numberBetween($min = 80000, $max = 970000),
        ];
    }
}
