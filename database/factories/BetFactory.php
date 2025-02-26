<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bet;
use App\Models\Group;
use App\Models\User;

class BetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'groupId' => fake()->numberBetween(-10000, 10000),
            'creatorId' => fake()->numberBetween(-10000, 10000),
            'categoryId' => fake()->numberBetween(-10000, 10000),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'totalAmount' => fake()->numberBetween(-10000, 10000),
            'startDate' => fake()->dateTime(),
            'endDate' => fake()->dateTime(),
            'status' => fake()->word(),
            'group_id' => Group::factory(),
            'user_id' => User::factory(),
        ];
    }
}
