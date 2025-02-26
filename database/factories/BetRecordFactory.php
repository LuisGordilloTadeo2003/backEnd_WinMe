<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BetEvent;
use App\Models\BetRecord;
use App\Models\User;

class BetRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetRecord::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'eventId' => fake()->numberBetween(-10000, 10000),
            'userId' => fake()->numberBetween(-10000, 10000),
            'action' => fake()->word(),
            'value' => fake()->regexify('[A-Za-z0-9]{255}'),
            'date' => fake()->dateTime(),
            'bet_event_id' => BetEvent::factory(),
            'user_id' => User::factory(),
        ];
    }
}
