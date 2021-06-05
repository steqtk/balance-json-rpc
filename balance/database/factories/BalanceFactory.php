<?php

namespace Database\Factories;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Balance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => mt_rand(-10000, 10000)/100,
            'balance' => mt_rand(1, 10000)/100,
            'user_id' => User::all()->modelKeys()[array_rand(User::all()->modelKeys())],
            'created_at' => date('Y-m-d H:i:s')
        ];

    }
}
