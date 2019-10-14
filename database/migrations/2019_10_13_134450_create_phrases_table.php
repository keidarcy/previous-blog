<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhrasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phrases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phrase', 32);
            $table->string('ip')->nullable();
            $table->integer('my_flg')->nullable()->default(0)->comment('{0:user;1:mine}');
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
        Schema::dropIfExists('phrases');
    }
}
