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
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("score")->comment("スコア");
            $table->integer("rank")->comment("スコアから算出されるランク");
            $table->integer("perfect")->comment("パーフェクト");
            $table->integer("strike")->comment("ストライクを取った数");
            $table->integer("hit")->comment("ヒットされた数");
            $table->integer("ball")->comment("ボールの数");
            $table->integer("combo")->comment("コンボ");
            $table->integer("difficulty")->comment("難易度");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
};
