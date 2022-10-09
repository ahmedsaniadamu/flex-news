<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table -> string('description' , 500 ) -> unique();
            $table -> string('category' , 100 ) -> default('article') ;
            $table -> string('slug' , 500 ) -> unique() -> nullable(false) ;
            $table -> string('source');
            $table -> string('image',700);
            $table -> longText('content');
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
        Schema::dropIfExists('posts');
    }
}
