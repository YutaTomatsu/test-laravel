<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' =>$this->faker->name,
            'gender' =>$this->faker->randomElement($array=['男性','女性']),
            'email' =>$this->faker->safeEmail,
            'post' =>$this->faker->postcode,
            'address' =>$this->faker->address,
            'build' =>$this->faker->randomElement(['', 'ビル', 'ハイツ']),
            'content' =>$this->faker->text($maxNbChars = 120)
        ];
    }
}

