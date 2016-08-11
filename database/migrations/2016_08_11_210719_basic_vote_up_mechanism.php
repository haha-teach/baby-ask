<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasicVoteUpMechanism extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function($t){
            $t->increments('id');
            $t->integer('user_id');
            $t->integer('answer_id');
            $t->timestamps();
        });

        Schema::table('answers', function($t){
            $t->integer('upvote_count')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');

        Schema::table('answers', function($t){
            $t->dropColumn('upvote_count');
        });
    }
}
