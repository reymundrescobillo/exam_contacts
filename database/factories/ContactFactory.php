<?php

namespace Database\Factories;
use App\Models\GeneralContacts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralContacts>
 */
class ContactFactory extends Factory
{
    protected $model = GeneralContacts::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'contact' => fake()->numerify('09#########'),
        ];
    }
}
