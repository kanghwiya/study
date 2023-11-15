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
        $date = $this->faker->dateTimeBetween('-1 years');
        return [
            //카테고리 번호, 제목, 내용, 작성일, 수정일, 삭제일자
            'categories_no' => $this->faker->randomNumber(1)
            ,'title' => $this->faker->realText(50)
            ,'content' => $this->faker->realText(1000)
            ,'created_at' => $date
            ,'updated_at' => $date
        ];
    }
}
