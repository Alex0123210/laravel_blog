<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            //$table->integer('comment_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('short_title');
            $table->string('img')->nullable();
            $table->text('text');
            $table->timestamps(); //фиксирует время создания или обновления
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
