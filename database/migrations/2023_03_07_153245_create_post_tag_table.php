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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            //creo la colonna per il post
            $table->unsignedBigInteger('post_id');
            //aggiungo la foreign key
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            //creo la colonna per i tag
            $table->unsignedBigInteger('tag_id');
            //aggiungo la foreign key
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
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
        Schema::dropIfExists('post_tag');
    }
};
