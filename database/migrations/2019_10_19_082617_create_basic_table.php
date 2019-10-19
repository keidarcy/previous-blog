<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nick_name', 16);
            $table->string('full_name', 16);
            $table->string('chinese_name', 16);
            $table->string('little_picture', 64);
            $table->string('big_picture', 64);
            $table->string('website', 64);
            $table->string('greet', 32);
            $table->text('introduction');
            $table->string('facebook', 64);
            $table->string('github', 64);
            $table->string('wechat', 64);
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
        Schema::dropIfExists('basic');
    }
}
