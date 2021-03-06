<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('configs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->string('name');
            $table->string('value');
            $table->tinyInteger('status')->default(1);
            $table->string('description');
        });
    }
}
