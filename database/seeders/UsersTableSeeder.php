<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Paulo Henrique Tameirão',
            'email' => 'phtfao@gmail.com',
            'cpf_cnpj' => '12345678901',
            'category' => 'C',
            'password' => '$2y$10$OqO1FtYKpX9BzE9xg2rQOuK0C2QlQoQ0w0jZlY1ZaX9Fk0JzCtX0a', // password
            'balance' => 1000,
        ]);
        User::factory()->create([
            'name' => 'PHTec LDTA',
            'email' => 'sac@phtec.com',
            'cpf_cnpj' => '01234567890001',
            'category' => 'L',
            'password' => '$2y$10$OqO1FtYKpX9BzE9xg2rQOuK0C2QlQoQ0w0jZlY1ZaX9Fk0JzCtX0a', // password
            'balance' => 10000,
        ]);
        User::factory(10)->create();
    }
}
