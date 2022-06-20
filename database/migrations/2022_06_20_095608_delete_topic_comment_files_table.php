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
        Schema::drop('topic_comment_files');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('topic_comment_files', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_comment_id');
            $table->integer('user_id');
            $table->string('path');
            $table->timestamps();
        });
    }
};
