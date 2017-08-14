<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->ipAddress('ip');
            $table->string('country',100);
            $table->string('city',100);
            $table->string('lat',30);
            $table->string('lon',30);
            $table->string('browser',60);
            $table->string('os',50);
            $table->timestamps();
            $table->enum('isactive',['Y','N'])->default('Y');

            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
