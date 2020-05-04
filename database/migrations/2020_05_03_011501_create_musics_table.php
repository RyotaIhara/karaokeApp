<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('scene_id');
            $table->string('music_title', 100);
            $table->string('artist', 100);
            $table->string('music_remark', 200)->nullable();
            $table->time('time')->nullable();
            $table->double('high_score')->nullable();
            $table->double('average_score')->nullable();
            $table->string('key')->default("0");
            $table->boolean('favorite_flg')->default(false);
            $table->boolean('delete_flg')->default(false);
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
        Schema::dropIfExists('musics');
    }
}
