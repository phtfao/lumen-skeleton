<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = $this->faker->randomElement(['C', 'L']);
        $cpf_cnpj = $category === 'C' ? $this->faker->unique()->numerify('###########') : $this->faker->unique()->numerify('##############');

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf_cnpj' => $cpf_cnpj,
            'category' => $category,
            'password' => '$2y$10$OqO1FtYKpX9BzE9xg2rQOuK0C2QlQoQ0w0jZlY1ZaX9Fk0JzCtX0a', // password
            'balance' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
