<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            // 글번호, 제목, 내용, 작성일, 수정일, 삭제일자
            $table->id(); // big_int, pk, auto_increment
            $table->string('title', 50); //default not null var_char(50)
            $table->string('content',1000); // varchar(1000), not null
            $table->timestamps(); // created_at, updated_at 로 자동 생성, null 허용
            $table->softDeletes(); // deleted_at 으로 자동 생성
        });
    }
    // php artisan make:migrate
    // php artisan migrate 실행
    // php artisan migrate:reset
    // php artisan migrate:rollback

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
