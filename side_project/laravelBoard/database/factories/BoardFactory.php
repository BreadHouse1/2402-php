<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\BoardName;
use Illuminate\Support\Arr;
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
        $arrImg = [
            '/public/img/cat1.png'
            ,'/public/img/cat2.png'
            ,'/public/img/cat3.png'
            ,'/public/img/cat4.png'
            ,'/public/img/cat5.png'
        ];
        return [
            // pk를 기준으로 랜덤생성후 첫번째 결과를 가져옴
            'user_id' => User::inRandomOrder()->first()->id
            ,'type' => BoardName::inRandomOrder()->first()->type
            ,'title' => $this->faker->realText(50)
            ,'content' => $this->faker->realText(1000)
            ,'img' => Arr::random($arrImg)
        ];
    }
}
