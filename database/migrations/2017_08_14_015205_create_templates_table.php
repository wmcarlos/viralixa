<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title',40);
            $table->string('description',255);
            $table->string('brand',100);
            $table->enum('show',['title','brand'])->default('title');
            $table->string('banner',100);
            $table->string('url',255);
            $table->text('socialbox');
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
        Schema::dropIfExists('templates');
    }
}
