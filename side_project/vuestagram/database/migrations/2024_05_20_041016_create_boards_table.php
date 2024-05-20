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
            $table->id();
            // unsigned : 부등호 제거
            $table->bigInteger('user_id')->unsigned();
            $table->string('content', 200);
            $table->string('img', 100);
            $table->integer('like')->default(0);
            // timestamp : created_at와 updated_at를 관리하고 생성해주는 laravel함수
            $table->timestamps();
            // softDeletes : deleted_at를  생성하고 관리해주는 laravel함수
            $table->softDeletes();
        });
    }

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
