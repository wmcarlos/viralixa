<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialsites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60);
            $table->string('url',255);
            $table->string('icon',150);
            $table->timestamps();
            $table->enum('isactive',['Y','N'])->default('Y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialsites');
    }
}
