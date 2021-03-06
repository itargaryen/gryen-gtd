<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            Schema::drop('banners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id')->unsigned();
            $table->string('cover');
            $table->tinyInteger('weight');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }
}
