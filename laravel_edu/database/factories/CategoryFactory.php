<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
// 팩토리 생성 : php artisan make:factory 팩토리명 --model=모델명
// 대량의 데이터를 생성. 테스트용으로 더미데이터를 만들 때 주로 사용함.
// laravel은 기본적으로 영어로 세팅되어있음. 그렇기에 factory도 아무런 설정이 없으면 영어로 들어감. 
// 겹치는 값이 없이 랜덤한 데이터가 들어가면 좋을테니
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        ];
    }
}
