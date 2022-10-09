<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('post_id') -> unsigned() ;
            $table -> text('comment') -> nullable(false) ;
            $table -> string('name') -> nullable(false);
            $table -> string('email') -> nullable(false) ;
            $table -> string('website') ;              
            $table -> boolean('comment_type') -> default(false) ;
            $table -> integer('comment_type') -> default(false) ;
            $table->timestamps();
            $table -> foreign('post_id') -> references('id') -> on('posts') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
