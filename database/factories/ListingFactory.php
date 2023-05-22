<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'aprtmnt_name'=>$this->faker->company(),
            'extras'=>'wifi, parking',
            'email'=>$this->faker->companyEmail(),
            'closest_town'=>$this->faker->sentence(2),
            'location'=>$this->faker->city(),
            'price'=>'5000',
            'description'=>$this->faker->paragraph(5),
            'contact_phone_number'=>'0713730285'
        ];
    }
}
