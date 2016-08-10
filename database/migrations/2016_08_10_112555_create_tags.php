<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function($t){
            $t->increments('id');
            $t->string('name');
            $t->timestamps();
        });

        Schema::create('question_tag', function($t){
            $t->integer('question_id');
            $t->integer('tag_id');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('question_tag');
    }
}
