<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{

    // artisan make:test 테스트 파일명 (파일명이 test로 끝나야 함)
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    // 게스트로 리다이렉트 했을 때
    public function test_index_게스트_리다이렉트() {
        $response = $this->get('/board');
        $response->assertRedirect('/user/login');
        // done이 나와야함. gest로 리다이렉트 했을 때 user/login으로 가느냐
        // php artsian test 로 테스트 하면 됨

    }
}
