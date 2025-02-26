<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bet;
use App\Models\BetEvent;

class BetEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetEvent::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'betId' => fake()->numberBetween(-10000, 10000),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'eventDate' => fake()->dateTime(),
            'status' => fake()->word(),
            'bet_id' => Bet::factory(),
        ];
    }
}
