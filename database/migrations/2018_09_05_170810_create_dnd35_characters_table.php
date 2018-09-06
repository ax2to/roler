<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnd35CharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnd35_characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->tinyInteger('str')->default(10);
            $table->tinyInteger('dex')->default(10);
            $table->tinyInteger('con')->default(10);
            $table->tinyInteger('int')->default(10);
            $table->tinyInteger('wis')->default(10);
            $table->tinyInteger('cha')->default(10);
            $table->string('name');
            $table->integer('race_id')->unsigned()->nullable();
            $table->tinyInteger('level')->default(0);
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
        Schema::dropIfExists('dnd35_characters');
    }
}
