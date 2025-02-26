<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bet;
use App\Models\BetUser;
use App\Models\User;

class BetUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'betId' => fake()->numberBetween(-10000, 10000),
            'userId' => fake()->numberBetween(-10000, 10000),
            'amount' => fake()->numberBetween(-10000, 10000),
            'bet_id' => Bet::factory(),
            'user_id' => User::factory(),
        ];
    }
}
