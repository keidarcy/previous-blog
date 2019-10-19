<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompleteFlgToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canvas_posts', function (Blueprint $table) {
            $table->boolean('complete')->default(0)->comment('0:not yet,1:finished');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('canvas_posts', function (Blueprint $table) {
            $table->dropColumn('complete');
        });
    }
}
