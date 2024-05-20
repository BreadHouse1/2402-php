<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            // rand(시작값,마지막값) : rand는 시작값과 마지막값의 사이에서 랜덤한 값을 가져온다
            'content' => $this->faker->realText(rand(10, 100)),
            'img' => '/img/cat'.rand(1,5).'.png',
            'like' => rand(1, 300),
        ];
    }
}
