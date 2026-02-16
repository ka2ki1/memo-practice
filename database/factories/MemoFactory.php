<?php

namespace Database\Factories;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoFactory extends Factory
{
    protected $model = Memo::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'body' => $this->faker->realText(40),
        ];
    }
}
